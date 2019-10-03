/**
 * @(#)penggajian_pegawai
 *
 * penggajian_pegawai application
 *
 * @author 
 * @version 1.00 2019/8/29
 */

//import package java untuk handle input
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

//import package java untuk handle array dan list
import java.util.*;


//buat class pegawai sebagai parent class
class Pegawai
{
    //deklarasi properti nama, nip dan alamat dengan modifier private
	private String nama;
	private String nip;
	private String alamat;
	
	//deklrasi properti gapok dan assign nilai 1500000 dengan modifier private
	private int gapok = 1500000;
	
	//membuat konstruktor class Pegawai dengan 3 parameter
	Pegawai(String nama, String nip, String alamat){
	    //mengasign nilai properti nama, nip dan alamat dengan nilai dari parameter
		this.nama = nama;
		this.nip = nip;
		this.alamat = alamat;
	}
	
	//membuat fungsi getNama dengan return bernilai string
	public String getNama(){
	    //mengembalikan nilai dengan nilai dari properti nama
		return this.nama;
	}
	
	//membuat fungsi getNama dengan return bernilai integer
	public int getGaji(){
	    //mengembalikan nilai dengan nilai dari properti gapok
		return this.gapok;
	}
}

//membuat class Staf dengan parent Pegawai (Staf adalah child class dari class Pegawai)
class Staf extends Pegawai
{
    //deklrasi properti jumlah_kehadiran dengan modifier private
	private int jumlah_kehadiran;
	
	//deklrasi properti tarif_harian dan mengasign dengan nilai 25000 dengan modifier private
	private int tarif_harian = 25000;
	
	//membuat konstruktor class Staf dengan 3 parameter 
	Staf(String nama, String nip, String alamat){
	    //memanggil konstruktor parent class Pegawai
		super(nama, nip, alamat);
	}
	
	//membuat class setKehadiran tanpa return nilai (void) dengan parameter hadir
	public void setKehadiran(int hadir){
	    //mengasign properti jumlah_kehadiran dengan nilai dari parameter hadir
		this.jumlah_kehadiran = hadir;
	}
	
	//membuat fungsi getNama dengan return bernilai integer
	public int getGaji(){
	    //mengembalikan nilai dengan nilai dari pemanggilan method Pegawai.getGaji() + properti jumlah_kehadiran * properti tarif_harian
		return super.getGaji() + (this.jumlah_kehadiran * this.tarif_harian);
	}
}

//membuat class Dosen dengan parent Pegawai (Staf adalah child class dari class Pegawai)
class Dosen extends Pegawai
{
    //deklrasi properti jumlah_sks dengan modifier private
	private int jumlah_sks;
	
	//deklrasi properti tarif_sks dan mengasign dengan nilai 75000 dengan modifier private
	private int tarif_sks = 75000;
	
	//membuat konstruktor class Dosen dengan 3 parameter
	Dosen(String nama, String nip, String alamat){
	    //memanggil konstruktor parent class Pegawai
		super(nama, nip, alamat);
	}
	
	//membuat class setSKS tanpa return nilai (void) dengan parameter sks
	public void setSKS(int sks){
	    //mengasign properti jumlah_sks dengan nilai dari parameter sks
		this.jumlah_sks = sks;
	}
	
	//membuat fungsi getNama dengan return bernilai integer
	public int getGaji(){
	    //mengembalikan nilai dengan nilai dari pemanggilan method Pegawai.getGaji() + properti jumlah_sks * properti jumlah_sks
		return super.getGaji() + (this.jumlah_sks * this.jumlah_sks);
	}
}

//membuat class DaftarGaji sebagai generic class
class DaftarGaji
{
    //deklrasi properti listPegawai bertipe arrayList yang menampung nilai instance dari class Pegawai
	List<Pegawai> listPegawai = new ArrayList<Pegawai>();
	
	//deklrasi properti gaji dengan modifier private
	private int gaji;
	
	//membuat konstruktor class Dosen dengan 1 parameter
	DaftarGaji(int gaji){
	    //mengasign properti gaji dengan nilai dari parameter gaji
		this.gaji = gaji;
	}
	
	//membuat class addPegawai tanpa return nilai (void) dengan parameter p
	public void addPegawai(Pegawai p){
	    //mempush parameter p kedalam array listPegawai
		this.listPegawai.add(p);
	}
	
	//membuat class addPegawai tanpa return nilai (void) tanpa parameter
	public void printSemuaGaji(){
	    //deklrasi variable i dan assign nilai 1
		int i = 1;
		
		//memprint tampilan
		System.out.println("================Daftar Gaji Pegawai===============");
		System.out.println("==================================================");
		
		//melakukan looping sesuai dengan jumlah isi dari listPegawai
		for(final Pegawai pegawai : listPegawai){
		    //memprint tampilan
		    System.out.println("====================== " + i + " =========================");
		    //memanggil method getNama dari object pegawai
			System.out.println("Nama \t\t: " + pegawai.getNama());
			//memanggil method getGaji dari object pegawai
			System.out.println("Gaji \t\t: " + pegawai.getGaji());
			System.out.println("==================================================");
			
			//variable i dinaikkan nilainya
			i++;
		}
		System.out.println("==================================================");
	}
}

//membuat class Main
public class Main
{
    //membuat method main
    public static void main(String[] args) throws IOException {
        //deklrasi variable br dan mengasign dengan nilai BufferedReader sebagai input handle
    	BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
    	
    	//membuat object baru DaftarGaji dan mengasign ke variable df
    	DaftarGaji df = new DaftarGaji(1500000);
    	
    	//deklrasi variable pegawai dengan tipe instance dari class Pegawai
    	Pegawai pegawai;
    	
    	//memprint tampilan
    	System.out.println("==========Selamat Datang di Aplikasi Penggajian==========");
    	System.out.println("=========================================================");
    	
    	//deklrasi variable i dan lanjut
    	int i;
    	String lanjut;
    	
    	//melakukan looping hingga user memasukkan nilai lanjut selain y atau Y
    	for(lanjut = "y"; lanjut.equals("y")||lanjut.equals("Y");){
    	    
    	    //memprint tampilan dan meminta user untuk menginputkan nilai sesuai arahan tampilan
    		System.out.print("Masukkan NIP pegawai \t: ");
    		String nip = br.readLine();
    		System.out.print("Masukkan nama pegawai \t: ");
    		String nama = br.readLine();
    		System.out.print("Masukkan alamat pegawai : ");
    		String alamat = br.readLine();
    		System.out.print("Masukkan jabatan pegawai (Dosen = d, Staf = s) \t: ");
    		String jabatan = br.readLine();
    		
    		//mengecek nilai dari variable jabatan
    		//jika nilai sama dengan d
    		if(jabatan.equals("d")){
    		    //mengasign variable pegawai dengan instance dari class Dosen
    			pegawai = new Dosen(nama, nip, alamat);
    			
    			System.out.print("Masukkan jumlah SKS dosen : ");
    			int sks = Integer.parseInt(br.readLine());
    			
    			//melakukan upcasting object pegawai ke instance Dosen agar dapat memanggil method setSKS
    			((Dosen)pegawai).setSKS(sks);
    			
    			//memanggil method addPegawai dan mempassing nilai pegawai
    			df.addPegawai(pegawai);
    		}
    		//jika nilai sama dengan d
    		else if(jabatan.equals("s")){
    		    //mengasign variable pegawai dengan instance dari class Staf
    			pegawai = new Staf(nama, nip, alamat);
    			
    			System.out.print("Masukkan jumlah kehadiran staf \t: ");
    			int hadir = Integer.parseInt(br.readLine());
    			
    			//melakukan upcasting object pegawai ke instance Staf agar dapat memanggil method setKehadiran
    			((Staf)pegawai).setKehadiran(hadir);
          
                //memanggil method addPegawai dan mempassing nilai pegawai
    			df.addPegawai(pegawai);
    		}
    		//jika inputan tidak ada yang sesuai dengan kondisi di atasnya
    		else{
    			System.out.println("Maaf jabatan yang Anda masukkan salah");
    		}
    		
    		//menanyai user apakah mau input lagi
    		System.out.println("Inputkan lagi gaji pegawai? (Y/n)");
    		lanjut = br.readLine();
    	}
    	
    	//menanyai user apakah mau print semua gaji
    	System.out.print("Print semua gaji? (Y/n)");
    	String cetak = br.readLine();
    	
    	//jika ya
    	if(cetak.equals("y")||cetak.equals("Y")){
    	    //memanggil method printSemuaGaji untuk mencetak semua gaji
    	    df.printSemuaGaji();
    	}
    }
}