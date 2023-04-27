import java.sql.*;

public class AddJob {
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
      String query1 = "SELECT * from Jobs;";
      //System.out.println("DEBUG(AddStudent L11):" + query1);
      builder.append("<br> Table Jobs before:" + myDB.query(query1) + "<br>");

      // Parse input string to get restauranrestaurant Name and Address
      String CompanyName;
      String JobTitle;
      String Salary;
      String DesiredMajor;

      // Read command line arguments
      // args[0] is the first parameter
      CompanyName = args[0];
      JobTitle = args[1];
      Salary = args[2];
      DesiredMajor = args[3];

      String q = "select IFNULL(max(JobId), 0) as max_id from Jobs";
      ResultSet result = myDB.rawQuery(q);
      int job_id = 1;
      if (result.next()) // get first row of result set
         job_id += result.getInt("max_id");

      // Insert the new restaurant
      String input = "'" + job_id + "','" + CompanyName + "','" + JobTitle + "','" + Salary  + "','" + DesiredMajor + "'";
      //System.out.println("DEBUG AddJob L34: " + input);
      myDB.insert("Jobs", input); // insert new student

      // For debugging purposes: Show the database after the insert
      builder.append("<br><br><br> Table Jobs after:" + myDB.query(query1));
      System.out.println(builder.toString());

      myDB.disConnect();
   }
}