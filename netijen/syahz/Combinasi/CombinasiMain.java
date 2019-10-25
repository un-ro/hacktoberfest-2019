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
public class CombinasiMain {
   public static void main(String[] args) {
        Combinasi ob = new Combinasi();
        ob.setBilanganN(25);
        ob.cetak("Bilangan N adalah "+ob.getBilanganN());
        ob.setBilanganR(5);
        ob.cetak("Bilangan R adalah "+ob.getBilanganR());
        
        ob.cetak(ob.getBilanganN(), ob.getBilanganR());
    }
}
