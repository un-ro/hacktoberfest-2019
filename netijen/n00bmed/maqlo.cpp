/*Powered by SGBteam
SGB FOR SOCIETY*/

#include <iostream>
#include <conio.h>
using namespace std;

main()
{
	 system ("color 0c");
	string alamat,tl,asal,hobi,jurusan;
	char nama[50],gender[10];
	int  umur;
	float tinggi,berat;
	cout<<"============================\n";
	cout<<"I MADE YOGA BARUNA PRADAYA\n";
	cout<<"20192205041\n";
	cout<<"PRAKTIKUM 4\n";
	cout<<"============================\n";
	cout<<"\n\n\n";
	cout<<"====BIODATA===\n";
	cout<<"Masukkan Nama anda =";
	cin.getline(nama,50);
	cout<<"Masukkan alamat anda =";
	cin>> alamat;
	cout<<"Masukkan tempat lahir anda =";
	cin>> tl;
	cout<<"Masukkan asal anda =";
	cin>> asal;
	cout<<"Masukkan hobi anda =";
	cin>> hobi;
	cout<<"Masukkan umur anda =";
	cin>> umur;
	cout<<"Masukkan berat anda =";
	cin>> berat;
	cout<<"Masukkan tinggi anda =";
	cin>> tinggi;
	cout<<"Masukkan gender anda (P/W) =";
	cin>> gender;
	cout<<"Masukkan jurusan anda =";
	cin>> jurusan;
	
	cout<<"\n\n\n";
	cout<<"===TAMPILAN DATA YANG TERINPUT===\n";
	cout<<"\nNama =\t"<<nama;
	cout<<"\nAlamat =\t"<<alamat;
	cout<<"\nTempat Lahir =\t"<<tl;
	cout<<"\nAsal =\t"<<asal;
	cout<<"\nHobby =\t"<<hobi;
	cout<<"\nUmur =\t"<<umur <<" Tahun";
	cout<<"\nBerat Badan =\t"<<berat <<" kg";
	cout<<"\nTinggi Badan =\t"<<tinggi <<" cm";
	cout<<"\nGender =\t"<<gender;
	cout<<"\nJurusan =\t"<<jurusan;
	cout<<"\n===TERIMA KASIH===";
	getch();
}
