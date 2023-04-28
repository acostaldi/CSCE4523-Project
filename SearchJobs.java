import java.sql.*;

public class SearchJobs {
   // The main program that inserts a restaurant
   public static void main(String[] args) throws SQLException {
      String Username = "MYSQLUSERNAME"; // Change to your own username
      String mysqlPassword = "MYSQLPASSOWORD"; // Change to your own mysql Password

      // Connect to the database
      jdbc_db myDB = new jdbc_db();
      myDB.connect(Username, mysqlPassword);
      myDB.initDatabase();

      
      // For debugging purposes: Show the database before the insert
      StringBuilder builder = new StringBuilder();
      String query1 = "SELECT * from Jobs;";
      //System.out.println("DEBUG(AddStudent L11):" + query1);
      builder.append("<br> Table Jobs before:" + myDB.query(query1) + "<br>");

      // Parse input string to get restauranrestaurant Name and Address
      
      String major;
      major = args[0];

      String query2;
      // Read command line arguments
      // args[0] is the first parameter
      if (major.equals("All")) {
        query2 = "SELECT * from Jobs;";
    } else {
        query2 = "SELECT * from Jobs WHERE DesiredMajor = '" + major + "';";
    }

      // For debugging purposes: Show the database after the insert
      builder.append("<br><br><br> Jobs with this major:" + myDB.query(query2));
      System.out.println(builder.toString());

      myDB.disConnect();
   }
}