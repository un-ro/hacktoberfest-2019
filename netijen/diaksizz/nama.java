package tugas;

import java.io.IOException;
import java.sql.*;
import java.util.Scanner;

public class dbl {
    static Scanner input = new Scanner(System.in);
    private Connection koneksi;
    private Statement st;
    private ResultSet rs;
    static String nimbaru, nama, nim,answer,kd_laptop,nama_laptop,nama_merek,id_merek,nid_merek,nkd_laptop;
    static int prodi,harga;
  
//------------------------- Koneksi Database ---------------------------//
  dbl() {

        try {
            Class.forName("com.mysql.jdbc.Driver");
            koneksi = DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/laptop","root","");
          } catch (ClassNotFoundException | SQLException ex) {
            System.out.println("Error Bosque");
        }
  }

//----------------------------- Show Data -------------------------------//
public void tampilData(){
    try{
            String query = "SELECT tl.`kd_laptop`,tl.`nama_laptop`,tm.`nama_merek`,tl.`harga` FROM tb_laptop tl,tb_merek tm "
                               + "WHERE tl.`id_merek`= tm.`id_merek` and tm.nama_merek = 'LENOVO'";
            st  = koneksi.prepareStatement(query);
            rs = st.executeQuery(query);
            System.out.println("------------------------------------------------------");
            System.out.println("kode_laptop |\t nama_laptop |\t nama_merek |\tharga");
            while (rs.next()) {               
                kd_laptop = rs.getString("kd_laptop");
                nama_laptop = rs.getString("nama_laptop");
                nama_merek = rs.getString("nama_merek");
                harga = rs.getInt("harga");
               System.out.println(kd_laptop+"\t\t"+nama_laptop+"\t\t"+nama_merek+"\t\tRp. "+harga);
            } 
            System.out.println("------------------------------------------------------");
           st.close();
       }catch(SQLException ex){
            System.out.println("Error:"+ex);
        }
    }
public void tampiltb_merek(){
    try{
            String query = "SELECT * FROM tb_merek ";
            st  = koneksi.prepareStatement(query);
            rs = st.executeQuery(query);
            System.out.println("------------------------------------------------------");
            System.out.println("id_merek |\t nama_merek");
            while (rs.next()) {               
                id_merek = rs.getString("id_merek");
                nama_merek = rs.getString("nama_merek");
               System.out.println(id_merek+"\t\t"+nama_merek);
            } 
            System.out.println("------------------------------------------------------");
           st.close();
       }catch(SQLException ex){
            System.out.println("Error:"+ex);
        }
    }
public void tampiltb_laptop(){
    try{
            String query = "SELECT * FROM tb_laptop";
            st  = koneksi.prepareStatement(query);
            rs = st.executeQuery(query);
            System.out.println("------------------------------------------------------");
            System.out.println("kode_laptop |\t nama_laptop |\t id_merek |\tharga");
            while (rs.next()) {               
                kd_laptop = rs.getString("kd_laptop");
                nama_laptop = rs.getString("nama_laptop");
                id_merek = rs.getString("id_merek");
                harga = rs.getInt("harga");
               System.out.println(kd_laptop+"\t\t"+nama_laptop+"\t\t"+id_merek+"\t\tRp. "+harga);
            } 
            System.out.println("------------------------------------------------------");
           st.close();
       }catch(SQLException ex){
            System.out.println("Error:"+ex);
        }
    }
//----------------------------- Insert Data -------------------------------//

 public int tambahDatamerek(String id_merek, String nama_merek){
        int i = 0;
        try{
            String query = "insert into tb_merek(id_merek,nama_merek) values('"+id_merek+"','"+nama_merek+"')";
            st  = koneksi.prepareStatement(query);
            i = st.executeUpdate(query);
        }catch(SQLException ex){
            System.out.println("Error:"+ex);
        }
            return i;
    }
 public int tambahDatalaptop(String kd_laptop, String nama_laptop, String id_merek, int harga){
        int i = 0;
        try{
            String query = "insert into tb_laptop(kd_laptop,nama_laptop,id_merek,harga) values('"+kd_laptop+"','"+nama_laptop+"','"+id_merek+"','"+harga+"')";
            st  = koneksi.prepareStatement(query);
            i = st.executeUpdate(query);
        }catch(SQLException ex){
            System.out.println("Error:"+ex);
        }
            return i;
    }
  
//----------------------------- Hapus Data -------------------------------//
public int hapusDataMerek(String id_merek){
        int i=0;
        try{
            String query = "delete from tb_merek where id_merek='"+id_merek+"'";
            st  = koneksi.prepareStatement(query);
            i = st.executeUpdate(query);
        }catch(SQLException ex){
            System.out.println("Error:"+ex);
        }
            return i;
    }  
public int hapusDataLaptop(String kd_laptop){
        int i=0;
        try{
            String query = "delete from tb_laptop where kd_laptop='"+kd_laptop+"'";
            st  = koneksi.prepareStatement(query);
            i = st.executeUpdate(query);
        }catch(SQLException ex){
            System.out.println("Error:"+ex);
        }
            return i;
    }      
    
//----------------------------- Update Data -------------------------------//
public int ubahDataMerek(String nid_merek,String id_merek,String nama_merek){
        int i=0;
        try{
            String query = "update tb_merek set id_merek='"+nid_merek+"', nama_merek='"+nama_merek+"' where id_merek='"+id_merek+"'";
            st  = koneksi.prepareStatement(query);
            i = st.executeUpdate(query);
        }catch(SQLException ex){
            System.out.println("Error:"+ex);
        }
            return i;
    }    

 public int ubahDataLaptop(String nkd_laptop,String kd_laptop, String nama_laptop, String id_merek, int harga){
        int i=0;
        try{
            String query = "update tb_laptop set kd_laptop='"+nkd_laptop+"',nama_laptop='"+nama_laptop+"',id_merek='"+id_merek+"', harga ='"+harga+"' where kd_laptop='"+kd_laptop+"'";
            st  = koneksi.prepareStatement(query);
            i = st.executeUpdate(query);
        }catch(SQLException ex){
            System.out.println("Error:"+ex);
        }
            return i;
    }    

//=========================================================================================//


static void showMenu() throws SQLException {
    System.out.println("\n========= MENU UTAMA =========");
    System.out.println("1. Tampil Data");
    System.out.println("2. Tambah Data");
    System.out.println("3. Delete Data");
    System.out.println("4. Ubah Data");
    System.out.println("0. Keluar");
    System.out.println("");
    System.out.print("PILIHAN> ");
    dbl dba = new dbl();
    try {
        int pilihan = Integer.parseInt(input.nextLine());

        switch (pilihan) {
            case 0:
                System.exit(0);
                break;
            case 1:
                System.out.println("\n========= Pilih tampilan =========");
                System.out.println("1. Detil Laptop");
                System.out.println("2. Tabel merek");
                System.out.println("3. Tabel laptop");
                System.out.print("PILIHAN> ");
                pilihan = Integer.parseInt(input.nextLine());
                switch(pilihan){
                     case 1:
                     dba.tampilData();
                     break;       
                     case 2:
                     dba.tampiltb_merek();
                     break;
                     case 3:
                     dba.tampiltb_laptop();
                     break;                }

                break;
            case 2:
                System.out.println("\n========= Pilih Tabel =========");
                System.out.println("1. tabel merek");
                System.out.println("2. tabel laptop");
                System.out.print("PILIHAN> ");
                pilihan = Integer.parseInt(input.nextLine());
                 switch(pilihan){
                     case 1:
                     dba.formTambahmerek();
                     break;       
                     case 2:
                     dba.formTambahlaptop();
                     break; }break;
            case 3:
                System.out.println("\n========= Pilih Tabel =========");
                System.out.println("1. tabel merek");
                System.out.println("2. tabel laptop");
                System.out.print("PILIHAN> ");
                pilihan = Integer.parseInt(input.nextLine());
                 switch(pilihan){
                     case 1:
                     dba.formHapusMerek();
                     break;       
                     case 2:
                     dba.formHapusLaptop();
                     break; }
                     break;
            case 4:
                System.out.println("\n========= Pilih Tabel =========");
                System.out.println("1. tabel merek");
                System.out.println("2. tabel laptop");
                System.out.print("PILIHAN> ");
                pilihan = Integer.parseInt(input.nextLine());
                 switch(pilihan){
                     case 1:
                     dba.formUbahMerek();
                     break;       
                     case 2:
                     dba.formUbahLaptop();
                     break; }
                 break;
            default:
                System.out.println("Pilihan salah!");
        }
    }
catch (NumberFormatException e) {}

//========================= Pause =======================//    
System.out.println("\nPress enter to continue...");
try{        System.in.read(); } //membaca inputan 
catch(IOException e){} // karena inputannya kosong dan langsung di enter maka baris ini bekerja sebagai penghandle, caranya yaitu meneruskan jalannya program 

kembali();
    
}

//-_-_-_-_-_-_-_-_-_-_-_-_-_- K E M B A L I _-_-_-_-_-_-_-_-_-_-_-_-_-//
public static void kembali() throws SQLException{
System.out.print("Kembali ke menu utama? (Y/T) : ");
    answer=input.nextLine();
        if(answer.equals("y") || answer.equals("Y"))
        showMenu();  
        else if (answer.equals("T")  || answer.equals("t")) {               
        System.exit(0);    } 
        else
        {System.out.println("pilihan salah");kembali();}
}

//-_-_-_-_-_-_-_-_-_-_-_-_-_- FORM Tambah Data _-_-_-_-_-_-_-_-_-_-_-_-_-//
public static void formTambahmerek(){
       dbl dba = new dbl();
       System.out.println("+============ Masukkan Data merek ============+");
        System.out.print("id_merek\t\t: ");
        id_merek = input.nextLine();
        System.out.print("nama_merek\t\t: ");
        nama_merek = input.nextLine();
        dba.tambahDatamerek(id_merek,nama_merek);
}
public static void formTambahlaptop(){
       dbl dba = new dbl();
       System.out.println("+============ Masukkan Data Laptop ============+");
        System.out.print("kd_laptop\t\t: ");
        kd_laptop = input.nextLine();
        System.out.print("nama_laptop\t\t: ");
        nama_laptop = input.nextLine();
        System.out.print("id_merek\t\t: ");
        id_merek = input.nextLine();
        System.out.print("harga\t\t: ");
        harga = input.nextInt();
        dba.tambahDatalaptop(kd_laptop,nama_laptop,id_merek,harga);
}

//-_-_-_-_-_-_-_-_-_-_-_-_-_- FORM hapus Data _-_-_-_-_-_-_-_-_-_-_-_-_-//
public static void formHapusMerek(){
       dbl dba = new dbl();
       System.out.println("\n\n+================= Form Hapus Data =================+\n");
        System.out.print("Masukkan id_merek yang akan dihapus datanya : ");
        id_merek = input.nextLine();
        dba.hapusDataMerek(id_merek);
}
public static void formHapusLaptop(){
       dbl dba = new dbl();
        System.out.println("\n\n+================= Form Hapus Data =================+\n");
        System.out.print("Masukkan kd_laptop yang akan dihapus datanya : ");
        kd_laptop = input.nextLine();
        dba.hapusDataLaptop(kd_laptop);
}

//-_-_-_-_-_-_-_-_-_-_-_-_-_- FORM Ubah Data _-_-_-_-_-_-_-_-_-_-_-_-_-//
public static void formUbahMerek() {
        dbl dba = new dbl();
        System.out.println("+============ Form Ubah Data ============+");
        System.out.println("Masukkan id_merek yang akan diubah datanya : ");
        nid_merek = input.nextLine();
        System.out.println(" ==_-=-+-=-_// Masukkan Data Baru \\_-=-+-=-_== ");
        System.out.print("id_merek\t\t: ");
        id_merek = input.nextLine();
        System.out.print("Nama merek\t\t: ");
        nama_merek = input.nextLine();
        dba.ubahDataMerek(nid_merek,id_merek,nama_merek);
}
public static void formUbahLaptop() {
        dbl dba = new dbl();
        System.out.println("+============ Form Ubah Data ============+");
        System.out.println("Masukkan kd_laptop yang akan diubah datanya\t: ");
        kd_laptop = input.nextLine();
        System.out.println(" ==_-=-+-=-_// Masukkan Data Baru \\_-=-+-=-_== ");
        System.out.print("kd_laptop\t: ");
        String nkd_laptop = input.nextLine();
        System.out.print("Nama laptop\t\t: ");
        nama_laptop = input.nextLine();
        System.out.print("id_merek\t\t: ");
        id_merek = input.nextLine();
        System.out.print("Harga\t\t: ");
        harga = input.nextInt();
        dba.ubahDataLaptop(nkd_laptop, kd_laptop, nama_laptop,id_merek,harga);
}
}
