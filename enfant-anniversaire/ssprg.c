#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include "struct.h"
#include "void.h"

void saisi(t_Employe Tabenploye[5], int n)
{
    int i,k;

        for (i=0; i<=n-1; i++)
        {
            printf("\nAjouter un employ%c \n Nom :",130);
            scanf("%s", &Tabenploye[i].nom);
            fflush(stdin);
            printf("\n Prenom :");
            scanf("%s", &Tabenploye[i].prenom);
            fflush(stdin);
            printf("\n Nombre d'enfants :");
            scanf("%d", &Tabenploye[i].Nbenf);
            fflush(stdin);
            for (k=0; k<Tabenploye[i].Nbenf; k++)
            {
                printf("\n Nom de l'enfant :");
                scanf("%s", &Tabenploye[i].Tabprogeniture[k].nom);
                fflush(stdin);
                printf("\n Prenom de l'enfant :");
                scanf("%s", &Tabenploye[i].Tabprogeniture[k].prenom);
                fflush(stdin);
                printf("\n Annee de naissance :");
                scanf("%d", &Tabenploye[i].Tabprogeniture[k].DateN.annee);
                fflush(stdin);
                printf("\n Mois de naissance :");
                scanf("%d", &Tabenploye[i].Tabprogeniture[k].DateN.mois);
                fflush(stdin);
                printf("\n Jour de naissance :");
                scanf("%d", &Tabenploye[i].Tabprogeniture[k].DateN.jour);
                fflush(stdin);
            }

        }
}

void recherche(t_Employe Tabenploye [5], int n)
{
    int i,j;
    time_t temps;
    struct tm date;
    time(&temps);
    date = *localtime(&temps);

    printf("\n\nLes Enfants qui ont un anniversaire ce mois sont :\n");
    printf("Mois = %d\n",date.tm_mon);

    for (i=0; i<n-1; i++)
    {
        for (j=0; j<10; j++)
        {
            if (Tabenploye[i].Tabprogeniture[j].DateN.mois == date.tm_mon+1)
            {
                printf("Nom :%s \n", Tabenploye[i].Tabprogeniture[i].nom);
                printf("Prenom :%s \n", Tabenploye[i].Tabprogeniture[i].prenom);
                printf("Mois :%d \n", Tabenploye[i].Tabprogeniture[i].DateN.mois);
            }
        }
    }

}
