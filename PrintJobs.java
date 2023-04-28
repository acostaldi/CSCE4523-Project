import java.sql.*;

public class PrintJobs {
   // The main program that inserts a restaurant
   public static void main(String[] args) throws SQLException {
      String Username = "MYSQLUSERNAME"; // Change to your own username
      String mysqlPassword = "MYSQLPASSWORD"; // Change to your own mysql Password
      StringBuilder builder = new StringBuilder();

      // Connect to the database
      jdbc_db myDB = new jdbc_db();
      myDB.connect(Username, mysqlPassword);
      myDB.initDatabase();

      // For debugging purposes: Show the database before the insert
      String query1 = "SELECT * from Jobs;";
      builder.append("<br> Available Jobs:" + myDB.query(query1) + "<br>");
      System.out.println(builder.toString());
    
      myDB.disConnect();
   }
}