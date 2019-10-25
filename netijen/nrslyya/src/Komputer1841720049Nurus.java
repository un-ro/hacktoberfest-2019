package com.mycompany.praktikum4.inheritance.tugas;

/**
 *
 * @author Nurus Laily
 */
public class Komputer1841720049Nurus {
    public String merk;
    public int kecProsesor;
    public int sizeMemory;
    public String jnsProsesor;
    public Komputer1841720049Nurus(){
        
    }
    public Komputer1841720049Nurus(String merk, int kecProsesor, int sizeMemory, String jnsProsesor){
        this.merk = merk;
        this.kecProsesor = kecProsesor;
        this.sizeMemory = sizeMemory;
        this.jnsProsesor = jnsProsesor;
    }
     public void tampilData(){
       System.out.println("Merk                     = " + merk);
       System.out.println("Kecepatan Prosesor       = " + kecProsesor);
       System.out.println("Size Memory              = " + sizeMemory);
       System.out.println("Jenis Prosesor           = " + jnsProsesor);
      
   }
}
