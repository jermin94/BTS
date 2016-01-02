import javax.swing.* ;
import java.awt.event.* ;

class Fenetre7 extends JFrame
{
	private int numero;
	private static Ecouteur ec;
	private static int nbFen=0;
	
	public Fenetre7()
	{
		nbFen++;
		numero = nbFen;
		setTitle ("Numero de la fenetre " + numero) ;
		setBounds (5, 5, 200, 200) ;
		addMouseListener (ec);
	}
	
	static
	{
		ec= new Ecouteur();
	}
}

class Ecouteur extends MouseAdapter
{
	private int numero;
	
	public void mouseReleased(MouseEvent event)
	{
		System.out.println("relachement en " + event.getX() + " " + event.getY());
	}
	
	public void mousePressed (MouseEvent event)
	{
		System.out.println("appui en " + event.getX() + " " + event.getY());
	}
}

public class Exo3 {
	public static void main (String args[])
	{
		final int nFen = 3;
		for (int i=0; i<nFen; i++)
		{
			Fenetre7 fen7 = new Fenetre7();
			fen7.setVisible(true);
		}
	}

}
