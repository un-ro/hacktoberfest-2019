package com.mycompany.praktikum4.inheritance.tugas;

/**
 *
 * @author Nurus Laily
 */
public class Pc1841720049Nurus extends Komputer1841720049Nurus {
    public int ukuranMonitor;
    public Pc1841720049Nurus(){
        
    }
    public Pc1841720049Nurus(String merk, int KecProsesor, int sizeMemory, String jnsProsesor, int ukuranMonitor){
        this.merk = merk;
        this.kecProsesor = kecProsesor;
        this.sizeMemory = sizeMemory;
        this.jnsProsesor = jnsProsesor;
        this.ukuranMonitor = ukuranMonitor;
    }
    public void tampilPc(){
       System.out.println("Merk                     = " + merk);
       System.out.println("Kecepatan Prosesor       = " + kecProsesor);
       System.out.println("Size Memory              = " + sizeMemory);
       System.out.println("Jenis Prosesor           = " + jnsProsesor);
       System.out.println("Ukuran Monitor           = " + ukuranMonitor);
      
   }
}
