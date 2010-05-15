#include <stdio.h>

main (argc, argv)
int argc;
unsigned char **argv;
{
if ( argc != 10)
   {
   printf (" ---ERROR EN LA SINTAXIS ---\n");
   printf ("Sintaxis: calculo <Password> <MerchantID> <AcquirerBIN> <TerminalID> <Num_operacion> <Importe> <TipoMoneda> <Exponente> <Referencia>\n");
   exit (1);
   }
   else
   {
   unsigned char Password [9];
   unsigned char Firma [1001];
   unsigned char MerchantID [10];
   unsigned char AcquirerBIN [11];
   unsigned char TerminalID [9];
   unsigned char Num_operacion [51];
   unsigned char Importe [16];
   unsigned char TipoMoneda [4];
   unsigned char Exponente [2];
   unsigned char Referencia [51];

   memset (Password, 0, sizeof (Password));
   memset (Firma, 0, sizeof (Firma));
   memset (MerchantID, 0, sizeof (MerchantID));
   memset (AcquirerBIN, 0, sizeof (AcquirerBIN));
   memset (TerminalID, 0, sizeof (TerminalID));
   memset (Num_operacion, 0, sizeof (Num_operacion));
   memset (Importe, 0, sizeof (Importe));
   memset (TipoMoneda, 0, sizeof (TipoMoneda));
   memset (Exponente, 0, sizeof (Exponente));
   memset (Referencia, 0, sizeof (Referencia));

   strncpy (Password, argv [1], sizeof (Password));
   strncpy (MerchantID, argv [2], sizeof (MerchantID));
   strncpy (AcquirerBIN, argv [3], sizeof (AcquirerBIN));
   strncpy (TerminalID, argv [4], sizeof (TerminalID));
   strncpy (Num_operacion, argv [5], sizeof (Num_operacion));
   strncpy (Importe, argv [6], sizeof (Importe));
   strncpy (TipoMoneda, argv [7], sizeof (TipoMoneda));
   strncpy (Exponente, argv [8], sizeof (Exponente));
   strncpy (Referencia, argv [9], sizeof (Referencia));

   calcular_firma (Password,MerchantID,AcquirerBIN,TerminalID,Num_operacion,Importe,TipoMoneda,Exponente,Referencia,Firma);
   printf (Firma);
   exit (0);
   }
}
