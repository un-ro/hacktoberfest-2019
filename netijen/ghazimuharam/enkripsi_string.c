#include <stdio.h>
#include <string.h>

void enkripsi(char* data, char* arah, int pergeseran);
int main(){
    char *y, str[255];
    int x;
    char pergeseran[6];
    char *ypergeseran=pergeseran;
    printf("Masukkan sebuah string : \n");
    scanf("%[^\n]", str);

    do{
        printf("Banyaknya pergeseran : \n");
        scanf("%d", x);
    }while(x<0);

    do{
        printf("Arah pergeseran : \n");
        scanf("%s", pergeseran!='\0');
        {
            *ypergeseran=tolower(*ypergeseran);
            ypergeseran++;
        }
        ypergeseran=pergeseran;
    } while(strcmp(pergeseran,"kanan")!=0 && strcmp(pergeseran,"kiri")!=0);

    if(x>0){
        y=str;
        for( ; *y!='\0'; y++){
            *y=tolower(*y++);
        }
        enkripsi(str, pergeseran, x);
        printf("\nKalimat setelah dienkripsi : %s", str);
    }
    return 0;
}

void enkripsi(char* data, char* arah, int pergeseran){
    int x;
    if(strcmp(arah,"kanan")==0){
        for( ; *data!='\0'; data++){
            if(*data==' '){ 
                continue;
            } else {
                for(x=0; x<pergeseran; x++){
                    if((*data)>='z'){
                        (*data)-=26;
                        (*data)++;
                    } else {
                        (*data)++;
                    }
                }    
            }
        }
    }else if(strcmp(arah,"kiri")==0){
        for( ; *data!='\0'; data++){
            if(*data==' '){
                continue;
            } else {
            for(x=0; x<pergeseran; x++){
                if((*data)<='a'){
                    (*data)+=26;
                    (*data)--;
                }
            }
        } else {
            (*data)--;
        }
    }