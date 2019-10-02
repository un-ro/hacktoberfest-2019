#include <stdio.h>
#include <string.h>
#include <stdlib.h>

int main(void){
	char c, *token;
	FILE *fp;
	char allstring[2000],*temp[2000],*atemp[2000];

	fp = fopen("data.txt","r");
	if(fp == NULL){
		printf("File Not Found!\n");
		exit(1);
	}
	int ctr = 0;
	while((c = getc(fp)) != EOF){
		if((c >= 'a' && c <= 'z') | (c >= 'A' && c <= 'Z') | (c == ' ') | (c == '\n') | (c == '\r')){
			if(allstring[ctr-1] == '\n' && c == '\n'){
				allstring[ctr-1] = ' ';
				continue;
			}
			allstring[ctr] = c;
    		ctr++;
		}
    }
    fclose(fp);

    token = strtok(allstring, " ");
    int cl = 0;
    int acl = 1;
    while(token != NULL) {
    	temp[cl] = token;
    	if(cl == 0){
    		atemp[0] = temp[0];
    	}
    	if(cl > 0){
    			int ctr = 0;
    			for(int x=0; x < acl; ++x){
	    			if((strcmp(temp[cl],atemp[x])) == 0){
	    				ctr++;
	    				break;
	    			}
	    		}
	    		if(ctr == 0){
	    				if(acl ==	 1){
	    					atemp[1] = temp[cl];
	    					acl++;
	    				}else{
	    					atemp[acl] = temp[cl];
	    					acl++;
	    				}
	    		}
    	}
    	cl++;
        token = strtok(NULL, " "); 
    }

    int end = 0;
    fp = fopen("Output.txt", "w+");
    for (int i = 0;i < acl;i++) {
        for (int j = 0;j < cl;j++){
            if (strcmp(atemp[i], temp[j]) == 0){
                end++;
            }	
        }
        fprintf(fp, "%s %d\n",atemp[i],end);
        end = 0;
    }
}