/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package sychronizer;

import java.io.FileInputStream;

import java.io.FileOutputStream;

import java.io.InputStream;
import java.io.OutputStream;
import java.security.KeyStore;

import java.security.cert.X509Certificate;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Iterator;
import java.util.List;


import javax.xml.crypto.dsig.CanonicalizationMethod;
import javax.xml.crypto.dsig.DigestMethod;
import javax.xml.crypto.dsig.Reference;
import javax.xml.crypto.dsig.SignatureMethod;
import javax.xml.crypto.dsig.SignedInfo;
import javax.xml.crypto.dsig.Transform;
import javax.xml.crypto.dsig.XMLSignature;
import javax.xml.crypto.dsig.XMLSignatureFactory;
import javax.xml.crypto.dsig.dom.DOMSignContext;
import javax.xml.crypto.dsig.dom.DOMValidateContext;
import javax.xml.crypto.dsig.keyinfo.KeyInfo;
import javax.xml.crypto.dsig.keyinfo.KeyInfoFactory;
import javax.xml.crypto.dsig.keyinfo.X509Data;
import javax.xml.crypto.dsig.spec.C14NMethodParameterSpec;
import javax.xml.crypto.dsig.spec.TransformParameterSpec;

import javax.xml.parsers.DocumentBuilderFactory;

import javax.xml.transform.Transformer;
import javax.xml.transform.TransformerFactory;
import javax.xml.transform.dom.DOMSource;
import javax.xml.transform.stream.StreamResult;

import org.w3c.dom.Document;

import org.w3c.dom.NodeList;


/**
 * Provides facilities for working with XML digital signatures and HealthVault things.
 */
public class Signature {
    private static Config cfg;
    public String DigitallySign(String xmlPath) throws Exception
    {
            // Create a DOM XMLSignatureFactory that will be used to
        // generate the enveloped signature.
        XMLSignatureFactory fac = XMLSignatureFactory.getInstance("DOM");

        // Create a Reference to the enveloped document (in this case,
        // you are signing the whole document, so a URI of "" signifies
        // that, and also specify the SHA1 digest algorithm and
        // the ENVELOPED Transform.
        Reference ref = fac.newReference
         ("", fac.newDigestMethod(DigestMethod.SHA1, null),
          Collections.singletonList
           (fac.newTransform
            (Transform.ENVELOPED, (TransformParameterSpec) null)),
             null, null);

        // Create the SignedInfo.
        SignedInfo si = fac.newSignedInfo
         (fac.newCanonicalizationMethod
          (CanonicalizationMethod.INCLUSIVE,
           (C14NMethodParameterSpec) null),
            fac.newSignatureMethod(SignatureMethod.RSA_SHA1, null),
             Collections.singletonList(ref));
        
        // Load the KeyStore and get the signing key and certificate.
        KeyStore ks = KeyStore.getInstance("JKS");
        
        cfg = new Config();
        
        ks.load(new FileInputStream(cfg.getKeystore()), "pushpalanka".toCharArray());
        KeyStore.PrivateKeyEntry keyEntry =
            (KeyStore.PrivateKeyEntry) ks.getEntry
                ("pushpalanka", new KeyStore.PasswordProtection("pushpalanka".toCharArray()));
        X509Certificate cert = (X509Certificate) keyEntry.getCertificate();

        // Create the KeyInfo containing the X509Data.
        KeyInfoFactory kif = fac.getKeyInfoFactory();
        List x509Content = new ArrayList();
        x509Content.add(cert.getSubjectX500Principal().getName());
        x509Content.add(cert);
        X509Data xd = kif.newX509Data(x509Content);
        KeyInfo ki = kif.newKeyInfo(Collections.singletonList(xd));
        
        
        
        // Instantiate the document to be signed.
        DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance();
        dbf.setNamespaceAware(true);
        Document doc = dbf.newDocumentBuilder().parse
            (new FileInputStream(xmlPath));

        // Create a DOMSignContext and specify the RSA PrivateKey and
        // location of the resulting XMLSignature's parent element.
        DOMSignContext dsc = new DOMSignContext
            (keyEntry.getPrivateKey(), doc.getDocumentElement());

        // Create the XMLSignature, but don't sign it yet.
        XMLSignature signature = fac.newXMLSignature(si, ki);

        // Marshal, generate, and sign the enveloped signature.
        signature.sign(dsc);
        
        
        // Output the resulting document.
        OutputStream os = new FileOutputStream(xmlPath);
        TransformerFactory tf = TransformerFactory.newInstance();
        Transformer trans = tf.newTransformer();
        trans.transform(new DOMSource(doc), new StreamResult(os));
        return "";
    }
    public String validateSignedDoc(String xmlpath) throws Exception{
        // Instantiate the document to be signed.
         XMLSignatureFactory fac = XMLSignatureFactory.getInstance("DOM");

        DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance();
        dbf.setNamespaceAware(true);
         Document doc = dbf.newDocumentBuilder().parse
            (new FileInputStream(xmlpath));

        // Find Signature element.
        NodeList nl =
            doc.getElementsByTagNameNS(XMLSignature.XMLNS, "Signature");
        if (nl.getLength() == 0) {
            throw new Exception("Cannot find Signature element");
        }

        // Create a DOMValidateContext and specify a KeySelector
        // and document context.-
        DOMValidateContext valContext = new DOMValidateContext
            (new X509KeySelector(), nl.item(0));

        // Unmarshal the XMLSignature.
        XMLSignature signature = fac.unmarshalXMLSignature(valContext);

        // Validate the XMLSignature.
        boolean coreValidity = signature.validate(valContext);
        
        // Check core validation status.
        if (coreValidity == false) {
            System.err.println("Signature failed core validation");
            boolean sv = signature.getSignatureValue().validate(valContext);
            System.out.println("signature validation status: " + sv);
            if (sv == false) {
                // Check the validation status of each Reference.
                Iterator i = signature.getSignedInfo().getReferences().iterator();
                for (int j=0; i.hasNext(); j++) {
                    boolean refValid = ((Reference) i.next()).validate(valContext);
                    System.out.println("ref["+j+"] validity status: " + refValid);
                }
            }
        } else {
            System.out.println("Signature passed core validation");
        }

        valContext.setProperty("javax.xml.crypto.dsig.cacheReference", Boolean.TRUE);
        // Unmarshal the XMLSignature.
        signature = fac.unmarshalXMLSignature(valContext);
        // Validate the XMLSignature.
        coreValidity = signature.validate(valContext);

        Iterator i = signature.getSignedInfo().getReferences().iterator();
        for (int j=0; i.hasNext(); j++) {
            InputStream is = ((Reference) i.next()).getDigestInputStream();
            // Display the data.
        }
        
        return "";
    }    
}
