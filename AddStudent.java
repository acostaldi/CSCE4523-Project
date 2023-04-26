import java.sql.*;


public class AddStudent {
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
      String query1 = "SELECT * from Student";
      System.out.println("DEBUG(AddStudent L11):" + query1);
      builder.append("<br> Table Student before:" + myDB.query(query1) + "<br>");

      // Parse input string to get restauranrestaurant Name and Address
      String name;
      String student_id;
      String major;

      // Read command line arguments
      // args[0] is the first parameter
      name = args[0];
      student_id = args[1];
      major = args[2];

      // Insert the new restaurant
      String input = "'" + student_id + "','" + name + "','" + major + "'";
      System.out.println("DEBUG AddStudent L34: " + input);
      myDB.insert("Student", input); // insert new student

      // For debugging purposes: Show the database after the insert
      builder.append("<br><br><br> Table Student after:" + myDB.query(query1));
      System.out.println(builder.toString());

      myDB.disConnect();
   }
}