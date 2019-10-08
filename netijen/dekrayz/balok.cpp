#include <stdio.h>
int main(){
	int pilihan;
	float p,l,t;
	float L,K,V;
	
	printf("1. menghitung luas balok\n");
	printf("2. menghitung keliling balok\n");
	printf("3. menghitung volume balok\n");
	printf("masukan pilihan : ");
	scanf("%d",&pilihan);
	
	switch(pilihan)
	{
		case 1:
			printf("\n\n1. menghitung luas balok\n");
			printf("p : ");
			scanf("%f",&p);
			printf("l : ");
			scanf("%f",&l);
			printf("t : ");
			scanf("%f",&t);
			
			L = 2*(p*l)+2*(p*t)+2*(l*t);
			
			printf("\nluas : %.2f cm2",L);
		break;
		
		case 2:
			printf("\n\n2. menghitung keliling balok\n");
			printf("p : ");
			scanf("%f",&p);
			printf("l : ");
			scanf("%f",&l);
			printf("t : ");
			scanf("%f",&t);
			
			K = 4*(p+l+t);
			
			printf("\nkeliling : %.2f cm",K);
		break;
		
		case 3:
			printf("\n\n3. menghitung volume balok\n");
			printf("p : ");
			scanf("%f",&p);
			printf("l : ");
			scanf("%f",&l);
			printf("t : ");
			scanf("%f",&t);
			
			V = p*l*t;
			
			printf("\nvolume : %.2f cm",V);
		break;
			
	}
}
