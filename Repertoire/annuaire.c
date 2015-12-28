#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdio.h>
#define N 10


int main()
{
int choix,i;
typedef struct Tannuaire
{
    char nom[25];
    char prenom[25];
    char tel[15];
    int numero;
};
struct Tannuaire BDAnnuaire[N] ={" "};;

while (choix != 5)
{
   printf("Quel est votre choix ? \n 1 - Ajouter\n 2 - Modifier\n 3 - Supprimer\n 4 - Consulter\n 5 - Quitter\n");
    scanf("%d", &choix);

switch (choix)
        {

case 1 : {

            for (i=0; i<1; i++)
            {
                printf("Entrer le Nom, Prenom et Telephone \n");
                scanf("%s", BDAnnuaire[i].nom);
                scanf("%s", BDAnnuaire[i].prenom);
                scanf("%s", BDAnnuaire[i].tel);
            }

            FILE *annuaire = NULL;
            annuaire = fopen ("annuaire.txt", "a");
            for (i=0; i<1; i++)
            {
                fprintf(annuaire,"%s ",BDAnnuaire[i].nom);
                fprintf(annuaire,"%s ",BDAnnuaire[i].prenom);
                fprintf(annuaire,"%s \n\n",BDAnnuaire[i].tel);
            }
            fclose(annuaire);
            break;
         }

case 2 : {
            int d;
            FILE *annuaire = NULL ;
            annuaire = fopen("annuaire.txt","r") ;

            for (i=0; i<N; i++)
            {
                fscanf(annuaire,"%s %s %s",BDAnnuaire[i].nom,BDAnnuaire[i].prenom,BDAnnuaire[i].tel);
            }

            for (i=0; i<N; i++)
            {
                printf("Numero : %d ",i);
                printf("Nom : %s  ",BDAnnuaire[i].nom);
                printf("Prenom : %s  ",BDAnnuaire[i].prenom);
                printf("Telephone : %s\n",BDAnnuaire[i].tel);
            }
            fclose(annuaire) ;

            printf("Quel numero modifier du client ?\n");
            scanf("%d",&d);

            printf("Nouveau Numero de telephone : ");
            scanf("%s", BDAnnuaire[d].tel);

            annuaire = fopen("annuaire.txt","r+");

            for (i=0; i<N; i++)
            {
                fprintf(annuaire,"%s ",BDAnnuaire[i].nom);
                fprintf(annuaire,"%s ",BDAnnuaire[i].prenom);
                fprintf(annuaire,"%s \n\n",BDAnnuaire[i].tel);
            }

            fclose(annuaire) ;

            break;
         }

case 3 : {
            int sup,cc;
            FILE *annuaire = NULL ;
            annuaire = fopen("annuaire.txt","r") ;

            for (i=0; i<N; i++)
            {
                fscanf(annuaire,"%s %s %s",BDAnnuaire[i].nom,BDAnnuaire[i].prenom,BDAnnuaire[i].tel);
            }

            for (i=0; i<N; i++)
            {
                printf("Numero : %d ",i);
                printf("Nom : %s  ",BDAnnuaire[i].nom);
                printf("Prenom : %s  ",BDAnnuaire[i].prenom);
                printf("Telephone : %s\n",BDAnnuaire[i].tel);
            }
            fclose(annuaire) ;

            printf("Quel numero de client supprime ?\n");
            scanf("%d",&sup);

            annuaire = fopen("annuaire.txt","w");

            for(i=0;i<sup;i++)
            {
                fprintf(annuaire,"%s ",BDAnnuaire[i].nom);
                fprintf(annuaire,"%s ",BDAnnuaire[i].prenom);
                fprintf(annuaire,"%s \n\n",BDAnnuaire[i].tel);
            }

            for (i=sup+1; i<N; i++)
            {
                fprintf(annuaire,"%s ",BDAnnuaire[i].nom);
                fprintf(annuaire,"%s ",BDAnnuaire[i].prenom);
                fprintf(annuaire,"%s \n\n",BDAnnuaire[i].tel);
            }

            fclose(annuaire) ;

            break;
          }

case 4 : {
            FILE *annuaire = NULL ;
            annuaire = fopen("annuaire.txt","r+") ;

            for (i=0; i<N; i++)
            {
                fscanf(annuaire,"%s %s %s",BDAnnuaire[i].nom,BDAnnuaire[i].prenom,BDAnnuaire[i].tel);
            }

            for (i=0; i<N; i++)
            {
                printf("Numero : %d ",i);
                printf("Nom : %s  ",BDAnnuaire[i].nom);
                printf("Prenom : %s  ",BDAnnuaire[i].prenom);
                printf("Telephone : %s\n",BDAnnuaire[i].tel);
            }
            fclose(annuaire) ;

            break;
         }

case 5 : {
            printf("Vous avez quitter le programme\n");
            break;
         }


default : {
            printf("Vous n'avez pas saisi le bon choix.\n");
            break;
          }
        }

    }
    return 0;
}
