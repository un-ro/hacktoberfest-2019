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
public class Laptop extends Komputer{
    public String jnsBaterai;
    
    public Laptop(){
        
    }
    
    public Laptop(String merk, int kecProcessor, int sizeMemory, 
            String jnsProcessor, String jnsBaterai){
        super(merk, kecProcessor, sizeMemory, jnsProcessor);
        this.jnsBaterai = jnsBaterai;
    }
    
    public void tampilLaptop(){
        super.tampilData();
        System.out.println("Jenis Baterai: " +jnsBaterai);
    }
}