
#include <stdio.h>
#include <stdlib.h>

int heures1();
float temperature1();
float temperature2();
float distance1();
float distance2();
float volume1();
float volume2();

int main(int arg, char *argv[])
{
	char rep;
	int choix;
	do{
		printf("\n Choisir :\n 1 pour horaire en secondes\n 2 pour secondes en horaire\n 3 pour degree en farenheit\n 4 pour fahrenheit en degree\n 5 pour KM en Miles\n 6 pour Miles en KM\n 7 pour Litre en gallons\n 8 pour gallons en Litre\n 9 Quitter\n");
		scanf("%d", &choix);
		switch (choix) {heures2();
		case 1:
			printf("Votre horaire en seconde est de %d secondes \n",heures1());
			break;
		case 2: {
		    heures2();
			break;
		}
		case 3: {
		    printf("Votre temperature en fahrenheit est de %10.2f \n",temperature1());
			break;
		}
		case 4: {
		    printf("Votre temperature en celcus est de %10.2f \n",temperature2());
			break;
		}
		case 5: {
		    printf("Votre distance en miles est de %10.2f \n",distance1());
			break;
		}
		case 6: {
		    printf("Votre distance en KM est de %10.2f \n",distance2());
			break;
		}
		case 7: {
		    printf("Votre volume en gallons est de %10.2f \n",volume1());
			break;
		}
		case 8: {
		    printf("Votre volume en Litres est de %10.2f \n",volume2());
			break;
		}
		case 9: {
			break;
		}
		default: {
			printf("Vous n'avez pas saisi le bon choix.\n");
		}
		}system("pause");

	} while (choix!=9);

	return 0;
}
int heures1()
{
	float h, m, s, x;
	printf("Donner l'heure en H/M/S \n");
	printf("H=");
	scanf("%f", &h);
	printf("M=");
	scanf("%f", &m);
	printf("S=");
	scanf("%f", &s);
	x = h * 3600;
	x = x + (m * 60);
	x = x + s;
	return(x);
}

void heures2()
{
    int sz,mz,hz,rs;
    printf("Donner l'heure en secondes:\n");
    printf("S=");
    scanf("%d",&sz);
    hz=sz/3600;
    mz=sz/60%60;
    rs=sz%60;
    printf("%d est equivalent a %d heures et %d minutes et %d sec\n",sz,hz,mz,rs);
}

float temperature1()
{
    float x,y;
    printf("Donner la temperature en degre celcus \n");
    printf("C=");
    scanf("%f", &x);
    y=x*1.8;
    y=y+32;
    return(y);
}


float temperature2()
{
    float x,y;
    printf("Donner la temperature en degre fahrenheit \n");
    printf("F=");
    scanf("%f", &x);
    y=x-32;
    y=y/1.8;
    return(y);
}

float distance1()
{
    float x,y;
    printf("Donner votre distance en KM\n");
    printf("KM=");
    scanf("%f", &x);
    y=x*0.62137;
    return(y);
}

float distance2()
{
    float x,y;
    printf("Donner votre distance en Miles\n");
    printf("M=");
    scanf("%f", &x);
    y=x/0.62137;
    return(y);
}

float volume1()
{
    float x,y;
    printf("Donner votre volume en Litres\n");
    printf("L=");
    scanf("%f", &x);x = h * 3600;
	x = x + (m * 60);
	x = x + s;
	return(x);
    y=x*0.264;
    return(y);
}

float volume2()
{
    float x,y;
    printf("Donner votre volume en Gallons\n");
    printf("G=");
    scanf("%f", &x);
    y=x*3.788;
    return(y);
}
