import java.sql.*;

public class AddApplication {
   // The main program that inserts a restaurant
   public static void main(String[] args) throws SQLException {
      String Username = "amcostal"; // Change to your own username
      String mysqlPassword = "eiTaa8co"; // Change to your own mysql Password

      // Connect to the database
      jdbc_db myDB = new jdbc_db();
      myDB.connect(Username, mysqlPassword);
      myDB.initDatabase();

      // For debugging purposes: Show the database before the insert
      StringBuilder builder = new StringBuilder();
      String query1 = "SELECT * from Applications;";
      //System.out.println("DEBUG(AddStudent L11):" + query1);
      builder.append("<br> Table Student before:" + myDB.query(query1) + "<br>");

      // Parse input string to get restauranrestaurant Name and Address
      String name;
      String jobId;

      // Read command line arguments
      // args[0] is the first parameter
      name = args[0];
      jobId = args[1];

      String query2 = ("SELECT StudentId FROM Students WHERE StudentName = '"+name+"';");
      System.out.println(myDB.specialQuery(query2));
      String input = "'" + myDB.specialQuery(query2) + "','" + jobId + "'";
      System.out.println();
      myDB.insert("Applications", input);


      // For debugging purposes: Show the database after the insert
      builder.append("<br><br><br> Table Applications after:" + myDB.query(query1));
      System.out.println(builder.toString());

      myDB.disConnect();
   }
}