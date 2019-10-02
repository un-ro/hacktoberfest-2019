/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Combinasi;

/**
 *
 * @author syafi
 */
public class Combinasi {
    private float bilanganN, bilanganR, faktorial,combin;
    
    public float getBilanganN(){
        return bilanganN;
    }
    
    public void setBilanganN(float bilanganN){
        this.bilanganN = bilanganN;
    }
    
    public float getBilanganR(){
        return bilanganR;
    }
    
    public void setBilanganR(float bilanganR){
        this.bilanganR = bilanganR;
    }
    
    public float faktorial(float f){
        if (f==1) 
            return 1;
        else
            return (f*faktorial (f-1));
    }
    
    public void cetak(float bilanganN, float bilanganR){
        combin = faktorial(bilanganN)/ (faktorial(bilanganN-bilanganR)*faktorial(bilanganR));
        System.out.println(combin);
    }
    
    public void cetak(String str){
        System.out.println(str);
    }
    
}
