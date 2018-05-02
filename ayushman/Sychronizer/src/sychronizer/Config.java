/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package sychronizer;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Properties;

public class Config
{
   Properties configFile;
   public Config()
   {
	configFile = new java.util.Properties();
	try {
            FileInputStream file;
            String path = "././config/config.properties";
            file = new FileInputStream(path);
            configFile.load(file);
            
	}catch(Exception eta){
	    eta.printStackTrace();
	}
   }
   public String getSchemaPath()
   {
	 String path = "././config/iohdcschema.xsd";
	return path;
   }
   public String getKeystore()
   {
	 String path = "././config/keystore.jks";
	return path;
   }
   public String getProperty(String key)
   {
	String value = this.configFile.getProperty(key);
	return value;
   }
   public boolean writeProperty(String key, String value){
        try {
            FileInputStream in = new FileInputStream("./config/config.properties");
            Properties props = new Properties();
            props.load(in);
            in.close();

            FileOutputStream out = new FileOutputStream("./config/config.properties");
            props.setProperty(key,value);
            props.store(out, null);
            out.close();
            return true;
        } catch (FileNotFoundException ex) {
            // file does not exist
        } catch (IOException ex) {
            // I/O error
        }
       return false;
   }
}