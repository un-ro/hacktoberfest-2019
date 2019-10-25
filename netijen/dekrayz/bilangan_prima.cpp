#include<stdio.h>

int main()
{
	int i,j,c;
	printf("menampilkan bilangan prima 1 - 100 \n\n");
		
	for(i=1;i<=100;i++)
	{
		c=2;
		for(j=1;j<=i;j++)
		{
			if(i%j==0)
			{
				c=c-1;
			}
		}
		if(c==0)
		{
			printf("%d ",i);
		}
	}
}

