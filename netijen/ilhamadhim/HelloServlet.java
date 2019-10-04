package servlets;

// To save as "<TOMCAT_HOME>\webapps\hello\WEB-INF\classes\HelloServlet.java"
import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.annotation.*;
 
@WebServlet("/sayhello")   
// Configure the request URL for this servlet (Tomcat 7/Servlet 3.0 upwards)
public class HelloServlet extends HttpServlet {

   // The doGet() runs once per HTTP GET request to this servlet.
   @Override
   public void doGet(HttpServletRequest request, HttpServletResponse response)
         throws IOException, ServletException {
 
      // Set the response MIME type of the response message
      response.setContentType("text/html");
      // Allocate a output writer to write the response message into the network socket
      PrintWriter out = response.getWriter();   
 
      // Write the response message, in an HTML page
      out.println("<!DOCTYPE html>");
      out.println("<html>");
      out.println("<head><title>Hello, World</title></head>");
      out.println("<body>");
      
      out.println("<style>");
      out.println(".hello {");
      out.println("color : blue;");
      out.println("background-color:yellow;");
      out.println("border: 1px solid black;");


      out.println("</style>");


      out.println("<h1 class='hello'>Hello, world!</h1>");  // says Hello
      // // Echo client's request information
      
      out.println("<br><br><br>");

      out.println("<table border=1 cellpadding= 20 cellspacing = 5 width = 100%>");
      out.println("<tr>");

      out.println("<td>");
      out.println("Hello");
      out.println("</td>");

      out.println("<td>");
      out.println("Hello");
      out.println("</td>");

      out.println("<td>");
      out.println("Hello");
      out.println("</td>");

      out.println("</tr>");

      out.println("<tr>");

      out.println("<td colspan=3>");
      out.println("HELLOOOOOO");      
      out.println("</td>");

      out.println("</tr>");
      

      out.println("</table>");
      out.println("</body></html>");
      out.close();  // Always close the output writer

   }
}