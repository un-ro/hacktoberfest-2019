package com.mycompany.praktikum4.inheritance.tugas;

/**
 *
 * @author Nurus Laily
 */
public class Leptop1841720049Nurus extends Komputer1841720049Nurus{
    public String jnsBatrei;
    public Leptop1841720049Nurus(){
        
    }
    public Leptop1841720049Nurus(String merk, int kecProsesor, int sizeMemory, String jnsProsesor, String jnsBatrei){
        this.merk = merk;
        this.kecProsesor = kecProsesor;
        this.sizeMemory = sizeMemory;
        this.jnsProsesor = jnsProsesor;
        
    }
    public void tampilLeptop(){
       System.out.println("Merk                     = " + merk);
       System.out.println("Kecepatan Prosesor       = " + kecProsesor);
       System.out.println("Size Memory              = " + sizeMemory);
       System.out.println("Jenis Prosesor           = " + jnsProsesor);
       System.out.println("Jenis Baterai            = " + jnsBatrei);
      
   }
}
