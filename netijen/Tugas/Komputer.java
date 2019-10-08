/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Jobsheet6.Tugas;

/**
 *
 * @author ASUS
 */
public class Komputer {
    public String merk, jnsProcessor;
    public int kecProcessor, sizeMemory;
    
    public Komputer(){
        
    }
    
    public Komputer(String merk, int kecProcessor, int sizeMemory, 
            String jnsProcessor){
        this.merk = merk;
        this.kecProcessor = kecProcessor;
        this.sizeMemory = sizeMemory;
        this.jnsProcessor = jnsProcessor;
    }
    
    public void tampilData(){
        System.out.println("Merk: " +merk);
        System.out.println("Jenis Processor: " +jnsProcessor);
        System.out.println("Kecepatan Processor:" +kecProcessor);
        System.out.println("Size Memory" +sizeMemory);
    }
}