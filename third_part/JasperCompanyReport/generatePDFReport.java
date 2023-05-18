import java.io.*;
import java.util.HashMap;
import javax.servlet.http.HttpServletResponse;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.web.client.RestTemplate;


import com.wavemaker.runtime.service.annotations.ExposeToClient;
import com.wavemaker.runtime.service.annotations.HideFromClient;


import com.wavemaker.runtime.file.model.DownloadResponse;
import com.wavemaker.runtime.file.model.Downloadable;

import com.wavemaker.connector.jasper.JasperConnector;
import com.wavemaker.connector.jasper.JasperExportType;
//import com.jasperreportconnector_integratio.jasperreportservice.model.*;


@ExposeToClient
public class JasperReportService {

    private static final Logger logger = LoggerFactory.getLogger(JasperReportService.class);
    
    @Autowired
    private JasperConnector jasperConnector;
    
    public Downloadable generatePDFReport() {
        String data = invokeService();
        
        logger.info("Calling connector to generate the jasperRepoet");
        ByteArrayOutputStream pdfReportStream = (ByteArrayOutputStream) jasperConnector.generateReport(JasperExportType.PDF, "jasperReport/restApi.jrxml", new HashMap<>(), data);
                            
        DownloadResponse downloadableResponse = new DownloadResponse(new ByteArrayInputStream(pdfReportStream.toByteArray()), "application/pdf", "jasper.pdf");

        downloadableResponse.setInline(false);

        return downloadableResponse;
    }
    
    // This method actually connects to the external web service
    private String invokeService(String companyName) {
        String url = "http://localhost:3000/"+companyName;
        
        RestTemplate restTemplate = new RestTemplate();
        String response = restTemplate.getForObject(url, String.class);
        logger.info(" Rest response : " + response);
        return response;
    }    
    
}