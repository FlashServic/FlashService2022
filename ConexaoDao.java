package dao;

import java.sql.Connection;
import java.sql.DriverManager;

public class ConexaoDao {
    
    public static Connection getConnection(){
    Connection con = null;
    try{
        Class.forName("com.mysql.jdbc.Driver");       
        con=DriverManager.getConnection("jdbc:mysql://localhost:3306/id18553025_flashservice","root","");
    }catch(Exception erro){
        System.out.println(erro);
    }
        return con;
    
    }
}
