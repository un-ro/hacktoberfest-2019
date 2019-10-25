package com.mycompany.praktikum4.inheritance.tugas;

/**
 *
 * @author Nurus Laily
 */
public class Mac1841720049Nurus extends Leptop1841720049Nurus {
   public String security;
   public Mac1841720049Nurus(){
       
   }
   public Mac1841720049Nurus(String merk, int kecProsesor, int sizeMemory, 
           String jnsProsesor, String jnsBatrei, String security){
       this.merk = merk;
       this.kecProsesor = kecProsesor;
       this.sizeMemory = sizeMemory;
       this.jnsProsesor = jnsProsesor;
       this.jnsBatrei = jnsBatrei;
       this.security = security;
   }
   public void tampilMac(){
       System.out.println("Merk                     = " + merk);
       System.out.println("Kecepatan Prosesor       = " + kecProsesor);
       System.out.println("Size Memory              = " + sizeMemory);
       System.out.println("Jenis Prosesor           = " + jnsProsesor);
       System.out.println("Jenis Baterai            = " + jnsBatrei);
       System.out.println("Security                 = " + security);
   }
}
