package com.mycompany.praktikum4.inheritance.tugas;

/**
 *
 * @author Nurus Laily
 */
public class Windows1841720049Nurus extends Leptop1841720049Nurus{
    public String fitur;
    public Windows1841720049Nurus(){
        
    }
    public Windows1841720049Nurus(String merk, int kecProsesor, int sizeMemory,
            String jnsProsesor, String jnsBatrei, String fitur){
        this.merk = merk;
        this.kecProsesor = kecProsesor;
        this.sizeMemory = sizeMemory;
        this.jnsProsesor = jnsProsesor;
        this.jnsBatrei = jnsBatrei;
        this.fitur = fitur;
    }
    public void tampilWindows(){
       System.out.println("Merk                     = " + merk);
       System.out.println("Kecepatan Prosesor       = " + kecProsesor);
       System.out.println("Size Memory              = " + sizeMemory);
       System.out.println("Jenis Prosesor           = " + jnsProsesor);
       System.out.println("Jenis Baterai            = " + jnsBatrei);
       System.out.println("Fitur                    = " + fitur);
   }
}
