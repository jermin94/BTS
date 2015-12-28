Alter table FACTURE
Add constraint FK_FAC_LIG Foreign key (compte_ligue)
References LIGUE (numcompte);


Alter table LIGNE_FACTURE
Add constraint FK_LIF_PRE Foreign key (code_prestation)
References PRESTATION (code);

Alter table LIGNE_FACTURE
Add constraint FK_LIF_FAC Foreign key (numfacture)
References FACTURE (numfacture);