#include <stdio.h>

int n;
char arr[110][110];

int countLetter(int currX,int currY, int plusX,int plusY,int counter){
	if(currX>=n||currY>=n||currX<0||currY<0) return counter;
	if(arr[currY][currX]!='.') counter++;
	return countLetter(currX+plusX,currY+plusY,plusX,plusY,counter);
	
}

int main(){
	scanf("%d",&n);
	for(int i=0;i<n;i++){
		scanf("%s",arr[i]);
	}
	int total=0;
	for(int i=0;i<n;i++){
		int horisontal = countLetter(0,i,1,0,0);
		if(horisontal>=3) total+= horisontal*(horisontal-1)*(horisontal-2)/6;
	}
	for(int i=0;i<n;i++){
		int horisontal = countLetter(i,0,0,1,0);
		if(horisontal>=3) total+= horisontal*(horisontal-1)*(horisontal-2)/6;
	}
	for(int i=0;i<n;i++){
		int horisontal = countLetter(0,i,1,1,0);
		if(horisontal>=3) total+= horisontal*(horisontal-1)*(horisontal-2)/6;
		horisontal = countLetter(i,0,1,1,0);
		if(horisontal>=3) total+= horisontal*(horisontal-1)*(horisontal-2)/6;
		horisontal = countLetter(i,0,-1,1,0);
		if(horisontal>=3) total+= horisontal*(horisontal-1)*(horisontal-2)/6;
		horisontal = countLetter(n-1,i,-1,1,0);
		if(horisontal>=3) total+= horisontal*(horisontal-1)*(horisontal-2)/6;
	}
	
	printf("%d",total);

}
