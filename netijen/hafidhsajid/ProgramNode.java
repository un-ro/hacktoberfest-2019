/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package pkg11;

import java.util.Scanner;

/**
 *
 * @author encrypted
 */
//this is node

    
class Node{
    int data;
    Node prev, next;
    Node(Node prev, int data, Node next)
    {
        this.prev=prev;
        this.data=data;
        this.next=next;
    }
}


    /**
     * @param args the command line arguments
     */
public class ProgramNode {
    Node head;
    int size;
    public ProgramNode()
    {
        size = 0;
        head = null;
    }
    public boolean kosong(){
        return head == null;
    }
    void insert(int data, int idx){
        Node tmp = head;
        if (!kosong()) {
            int i = 1;
            while (i<idx)
            {
                tmp = tmp.next;
                i++;
            }
        }
        
    }
    void removeFirst(){
        Node tmp = head;
        if (!kosong()) {
            while (tmp.prev != null)
            {
                tmp = tmp.prev;
            }
            head = head.next;
            head.prev = null;
            size--;
        }
        else
            System.out.println("Empty");
    }
    public void add(int item)
    {
            Node skr = head;
            while (skr.next != null)
            {
                skr = skr.next;
            }
            Node nodbaru = new Node(skr, item, null);
            skr.next = nodbaru;
            size++;
        }
    
    void print(){
        
//        System.out.println("LL");
    
        if (!kosong()){
            Node tmp = head;
            while ((tmp!=null))
            {
                System.out.println(tmp.data+ "\t");
                tmp = tmp.next;
            }
            System.out.println("Terisi");
        }
        else
        {
            System.out.println("empty");
        }
    }
    
    
    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);
        ProgramNode a = new ProgramNode();
        
        System.out.print("choose \n1. Insert\n2. remove first\n3. Print");
        int pilih = input.nextInt();
        if (pilih == 1) {
            System.out.println("Masukkan yang ingin di insert: ");
            int enter = input.nextInt();
//            System.out.println("Masukkan indx");
//            int idx = input.nextInt();
//            a.insert(enter, idx);
            a.add(enter);
        }
        else if (pilih ==2) {
            a.removeFirst();
        }
        else
        {
            a.print();
        }
        System.out.println("testing");
    }
    
}
