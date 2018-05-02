/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package sychronizer;


import java.net.*;
import java.io.*;
import java.util.logging.Level;
import java.util.logging.Logger;


import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.InputStreamReader;
import java.net.URL;
import java.security.KeyStore;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import javax.xml.XMLConstants;
import javax.xml.transform.stream.StreamSource;
import javax.xml.validation.Schema;
import javax.xml.validation.SchemaFactory;
import javax.xml.validation.Validator;
import org.xml.sax.SAXException;
import java.security.KeyStore;
import java.security.PrivateKey;
import java.security.cert.X509Certificate;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import org.w3c.dom.Document;
import org.w3c.dom.Element;

/**
 *
 * @author Administrator
 */
public class Sychronizer {
    private static Config cfg;
    private static String token;
    public static void main(String[] args) throws IOException {
        System.out.println("started......");
        cfg = new Config();
        String url   = cfg.getProperty("URL");
        String response = "";
        token = getToken(); // returns token if authentication is successful.
        if(!token.equals("")){
            boolean i = getOrders(token); // ask for the orders
            response = sendAcknowlegement(url+".xml?action=Acknowledgement&token="+token); // send order acknowlegements
            response = uploadReports(url+".xml?action=UploadReports&token="+token); // upload reports.
            System.out.println("Sync completed.");
        }else{
            System.out.println("Sync failed.");
        }
    }
    
    private static boolean getOrders(String token){
        try{
            System.out.println("Started pulling orders.....");
            String url   = cfg.getProperty("URL");
            String location = cfg.getProperty("NEW_ORDERS_LOCATION");
            long unixTime = System.currentTimeMillis() / 1000L;
            
            String response = getResponse(url+".xml?action=GetNewOrders&lastid=&token="+token);
             System.out.println(url+".xml?action=GetNewOrders&lastid=&token="+token);
            String filePath = location+"individualorders_"+unixTime+".xml";
            FileWriter fr= new FileWriter(new File(filePath));
            Writer br= new BufferedWriter(fr);
            response = response.replace("&lt;", "<");
            response = response.replace("&gt;", ">");
            response = response.replace("<content>", "");
            response = response.replace("</content>", "");
            
            
            br.write(response);
            br.close();
            
            String validationResponse = validateXMLSchema( cfg.getSchemaPath(),filePath);
            boolean isValid = (validationResponse.equals(""))?true:false;
            
            Signature sign  = new Signature();
            String str = sign.DigitallySign(filePath);
            String strv = sign.validateSignedDoc(filePath);
            System.out.println("string");
            System.out.println(str);
            
            
            cfg = new Config();
            MD5 hash = new MD5();
            String md5Hash = hash.getMD5(response);
            
            
            if(isValid){
                System.out.println("All Orders are pulled.");
                 acknowledge(cfg.getProperty("REQID"),"GetNewOrders","Valid Xml Received",md5Hash);
                
                 return true;
            }else{
                System.err.println("orders downloaded is not in format.");
                acknowledge(cfg.getProperty("REQID"),"GetNewOrders","InValid Xml Received",md5Hash);
                return false;
            }
        }catch(Exception ex){
            System.err.println(ex.getLocalizedMessage());
            return false;
        }
    }
    
    private static String getToken(){
        cfg = new Config();
        String url   = cfg.getProperty("URL");
        String username   = cfg.getProperty("USERNAME");
        String password   = cfg.getProperty("PASSWORD");
        System.out.println("Authenticating ....."+url);
        String response = getResponse(url+"?action=Login&username="+username+"&password="+password+"&remember=true");
        System.out.println(response);
        JSONObject jsonObj = new JSONObject(response);
        String type = jsonObj.getString("type");
        String data = jsonObj.getString("data");
        if(type.equals("success")){
            cfg = new Config();
            acknowledge(cfg.getProperty("REQID"),"Login","Login Success","");
            return data;            
        }else{
            cfg = new Config();
             System.err.println("Login Failed");
            acknowledge(cfg.getProperty("REQID"),"Login","Login Failed","");
            return "";
        }
   }
    
    private static String sendAcknowlegement(String url){ 
         System.out.println("Started sending order acknowlegements.....");  
        String response = "";
        try {
                cfg = new Config();
                String ackLocation   = cfg.getProperty("ACK_LOCATION");

                File folder = new File(ackLocation);
                File[] listOfFiles = folder.listFiles();
                for (int i = 0; i < listOfFiles.length; i++) {
                  if (listOfFiles[i].isFile()) {
                      String files = listOfFiles[i].getName();
                      if (files.endsWith(".xml") || files.endsWith(".XML"))
                      {
                            String validationResponse = validateXMLSchema( cfg.getSchemaPath(),ackLocation+files);
                            acknowledge("","Acknowledgement","Trying to send invalid acknowlegement.("+validationResponse+")","");
                            boolean isValid = (validationResponse.equals(""))?true:false;
                            if(isValid){
                                URL obj = new URL(url);
                                System.out.println(url);
                                HttpURLConnection con = (HttpURLConnection) obj.openConnection();
                                con.setRequestMethod("POST");
                                con.setRequestProperty("Accept-Language", "en-US,en;q=0.5");

                                BufferedReader reader = new BufferedReader(new FileReader(ackLocation+files));
                                String line = null;
                                String xml = "";
                                while ((line = reader.readLine()) != null) {
                                   xml = xml + line;
                                }
                                MD5 hash = new MD5();
                                String md5Hash = hash.getMD5(xml);
                                 xml = URLEncoder.encode(xml, "UTF-8");  
                                
                                con.setDoOutput(true);
                                DataOutputStream wr = new DataOutputStream(con.getOutputStream());
                                String id = cfg.getProperty("REQID");
                                int intId = Integer.parseInt(id) + 1;
                                cfg.writeProperty("REQID", String.valueOf(intId));
                                wr.writeBytes("xml="+ xml +"&reqid="+String.valueOf(intId));
                                wr.flush();
                                wr.close();
                                
                                int responseCode = con.getResponseCode();
                                
                                BufferedReader in = new BufferedReader(
                                        new InputStreamReader(con.getInputStream()));
                                String inputLine;
                                 while ((inputLine = in.readLine()) != null) {
                                    response = response + inputLine;
                                }
                                in.close();
                                md5Hash = hash.getMD5(response);
                                
                                cfg = new Config();
                                acknowledge(cfg.getProperty("REQID"),"","Request Status Code :"+responseCode,md5Hash);
                                
                                String location = cfg.getProperty("ACK_LOCATION");
                                long unixTime = System.currentTimeMillis() / 1000L;
                                FileWriter fr= new FileWriter(new File(location+"RESPONSE/ack_status_"+unixTime+".xml"));
                                Writer br= new BufferedWriter(fr);
                                br.write(response);
                                br.close();
                                cfg = new Config();

                                validationResponse = validateXMLSchema( cfg.getSchemaPath(),location+"RESPONSE/ack_status_"+unixTime+".xml");
                                boolean isValidAck = (validationResponse.equals(""))?true:false;
                                if(isValidAck){
                                    acknowledge(cfg.getProperty("REQID"),"Acknowledgement","Valid Acknowledgement response Received",md5Hash);
                                    File fileToDelete = new File(ackLocation+files);  
                                    if (fileToDelete.delete()) {  
                                       System.out.println("File deleted successfully !");  
                                    } else {  
                                       System.out.println("File delete operation failed !");  
                                    }  
                                }else{
                                    System.err.println("invalid order xml is received. file path = '"+location+"RESPONSE/ack_status_"+unixTime+".xml"+"'");
                                    acknowledge(cfg.getProperty("REQID"),"Acknowledgement","InValid Acknowledgement response Received","md5Hash");
                                }
                            }else{
                                acknowledge("","Acknowledgement","Trying to send invalid acknowlegement.","");
                            }

                      }
                  } else if (listOfFiles[i].isDirectory()) {
                    
                  }
                }
        } catch (IOException ex) {
            Logger.getLogger(Sychronizer.class.getName()).log(Level.SEVERE, null, ex);
        } 
        return response;
    }
    
    private static String uploadReports(String url){ 
        System.out.println("Uploading reports......");  
        String response = "";
        try {
                cfg = new Config();
                String reportLocation   = cfg.getProperty("REPORTS_LOCATION");

                File folder = new File(reportLocation);
                File[] listOfFiles = folder.listFiles();
                for (int i = 0; i < listOfFiles.length; i++) {
                  if (listOfFiles[i].isFile()) {
                      String files = listOfFiles[i].getName();
                      if (files.endsWith(".xml") || files.endsWith(".XML"))
                      {
                            String validationResponse = validateXMLSchema( cfg.getSchemaPath(),reportLocation+files);
                            boolean isValid = (validationResponse.equals(""))?true:false;
                            if(isValid){
                                URL obj = new URL(url);
                                HttpURLConnection con = (HttpURLConnection) obj.openConnection();
                                con.setRequestMethod("POST");
                                con.setRequestProperty("Accept-Language", "en-US,en;q=0.5");

                                BufferedReader reader = new BufferedReader(new FileReader(reportLocation+files));
                                String line = null;
                                String xml = "";
                                while ((line = reader.readLine()) != null) {
                                    //if(line.contains("<document>")){
                                       // line = line + URLEncoder.encode(line, "UTF-8");
                                       /* line = line.replace('+', '@');
                                        line = line.replace('/', '_');
                                        line = line.replace('=', '*');
                                        line = line.replace("<_document>", "</document>");*/
                                   // }
                                   xml = xml + line;
                                } 
                                MD5 hash = new MD5();
                                String md5Hash = hash.getMD5(xml);
                                System.out.println(md5Hash);
                                xml = URLEncoder.encode(xml, "UTF-8");  
                               
                                con.setDoOutput(true);
                                con.setRequestProperty("Connection", "Keep-Alive");
                                con.setRequestProperty("Cache-Control", "no-cache");

                                OutputStream out = con.getOutputStream();

                                DataOutputStream wr = new DataOutputStream(out);
                                 String id = cfg.getProperty("REQID");
                                int intId = Integer.parseInt(id) + 1;
                                cfg.writeProperty("REQID", String.valueOf(intId));
                                wr.writeBytes("xml="+ xml +"&hash="+md5Hash+"&reqid="+String.valueOf(intId));
                                wr.flush();
                                wr.close();
                                
                                int responseCode = con.getResponseCode();
                                
                                BufferedReader in = new BufferedReader(
                                        new InputStreamReader(con.getInputStream()));
                                String inputLine;
                                 while ((inputLine = in.readLine()) != null) {
                                    response = response + inputLine;
                                }
                                in.close();
                                md5Hash = hash.getMD5(response);
                                
                                cfg = new Config();
                                acknowledge(cfg.getProperty("REQID"),"","Request Status Code :"+responseCode,md5Hash);
                                
                                String location = cfg.getProperty("REPORT_ACK_LOCATION");
                                long unixTime = System.currentTimeMillis() / 1000L;
                                FileWriter fr= new FileWriter(new File(location+"report_upload_status_"+unixTime+".xml"));
                                Writer br= new BufferedWriter(fr);
                                br.write(response);
                                br.close();
                                cfg = new Config();
                                validationResponse = validateXMLSchema( cfg.getSchemaPath(),location+"report_upload_status_"+unixTime+".xml");
                                boolean isValidAck = (validationResponse.equals(""))?true:false;
                                if(isValidAck){
                                    System.out.println("Uploading completed.");
                                    acknowledge(cfg.getProperty("REQID"),"UploadReports","Valid UploadReports response Received",md5Hash);
                                }else{
                                    System.out.println("Uploading is not successful. (invalid xml downloaded)");
                                    acknowledge(cfg.getProperty("REQID"),"UploadReports","InValid UploadReports response Received",md5Hash);
                                }
                                
                            }else{
                                acknowledge("","UploadReports","Uploading reports is failed. Trying to upload invalid xml...","");
                                System.out.println("Uploading reports is failed. Trying to upload invalid xml..."+validationResponse);
                            }
                      }
                  } else if (listOfFiles[i].isDirectory()) {
                    // if directory 
                  }
                }
        } catch (IOException ex) {
            System.out.println("Error while uploading reports");  
            Logger.getLogger(Sychronizer.class.getName()).log(Level.SEVERE, null, ex);
        } 
        return response;
    }
    
    private static void writefile(String stream) {
        BufferedWriter writer = null;
        try {
            //create a temporary file
            String timeLog = new SimpleDateFormat("yyyyMMdd_HHmmss").format(Calendar.getInstance().getTime());
            File logFile = new File(timeLog);

            writer = new BufferedWriter(new FileWriter(logFile));
            writer.write(stream);
        } catch (Exception e) {
            e.printStackTrace();
        } finally {
            try {
                writer.close();
            } catch (Exception e) {
            }
        }
    }
    
    private static byte[] loadFile(File file) throws IOException {
        InputStream is = new FileInputStream(file);

        long length = file.length();
        if (length > Integer.MAX_VALUE) {
            // File is too large
        }
        byte[] bytes = new byte[(int)length];

        int offset = 0;
        int numRead = 0;
        while (offset < bytes.length
               && (numRead=is.read(bytes, offset, bytes.length-offset)) >= 0) {
            offset += numRead;
        }

        if (offset < bytes.length) {
            throw new IOException("Could not completely read file "+file.getName());
        }

        is.close();
        return bytes;
    }
    
    private static String getResponse(String url){ 
        String response = "";
        try {
            cfg = new Config();
            URL conURL;
            conURL = new URL(url);
            
            HttpURLConnection yc = (HttpURLConnection) conURL.openConnection();
            yc.setDoOutput(true);
            DataOutputStream wr = new DataOutputStream(yc.getOutputStream());

            String id = cfg.getProperty("REQID");
            int intId = Integer.parseInt(id) + 1;
            cfg.writeProperty("REQID", String.valueOf(intId));
            wr.writeBytes("reqid="+String.valueOf(intId));
            wr.flush();
            wr.close();
            
            int responseCode = yc.getResponseCode();
            
            BufferedReader in = new BufferedReader(new InputStreamReader(yc.getInputStream()));
            String inputLine;
           
            while ((inputLine = in.readLine()) != null) {
                response = response + inputLine;
            } 
            
            cfg = new Config();
            MD5 hash = new MD5();
            String md5Hash = hash.getMD5(response);
            acknowledge(cfg.getProperty("REQID"),"","Request Status Code :"+responseCode,md5Hash);
            
            in.close();
        } catch (IOException ex) {
            ex.getMessage();
            
            Logger.getLogger(Sychronizer.class.getName()).log(Level.SEVERE, null, ex);
        } 
        return response;
    }
    
    private static boolean acknowledge(String id, String action,String status , String hash){
            DateFormat dateFormat = new SimpleDateFormat("dd-mm-yyyy HH:mm:ss");
            Date date = new Date();
            status = dateFormat.format(date) +" :- "+ status;
            
            String url   = cfg.getProperty("URL");
            url = url + ".json?action=ack&token="+token+"&for="+action;
            
            String response = "";
            try {
                URL conURL;
                conURL = new URL(url);
                URLConnection yc = conURL.openConnection();
                 yc.setDoOutput(true);
                DataOutputStream wr = new DataOutputStream(yc.getOutputStream());
                wr.writeBytes("reqid="+String.valueOf(id)+"&hash="+hash+"&status="+status);
                wr.flush();
                wr.close();
                BufferedReader in = new BufferedReader(new InputStreamReader(yc.getInputStream()));
                String inputLine;

                while ((inputLine = in.readLine()) != null) {
                    response = response + inputLine;
                }
                in.close();
            } catch (IOException ex) {
                Logger.getLogger(Sychronizer.class.getName()).log(Level.SEVERE, null, ex);
            } 
            return true;
    }
    
    private static String validateXMLSchema(String xsdPath, String xmlPath){
         
        try {
            SchemaFactory factory = 
                    SchemaFactory.newInstance(XMLConstants.W3C_XML_SCHEMA_NS_URI);
            Schema schema = factory.newSchema(new File(xsdPath));
            Validator validator = schema.newValidator();
            validator.validate(new StreamSource(new File(xmlPath)));
        } catch (IOException | SAXException e) {
            return e.getMessage();
        }
        return "";
    }
    
}

