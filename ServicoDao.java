package dao;

import classes.Servico;
import static dao.ConexaoDao.getConnection;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;

public class ServicoDao {
    public static List<Servico> getServicos() {
        List<Servico> list = new ArrayList<Servico>();   

        try{
            Connection con = getConnection(); 
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT * FROM servicos");
            ResultSet rs = ps.executeQuery(); 

            while(rs.next()){
                Servico servico = new Servico();
                servico.setId(rs.getInt("id"));
                servico.setNome(rs.getString("nome"));
                list.add(servico);
            }
            
        }catch(Exception erro){
            System.out.println(erro);
        }
        return list;
    }
}
