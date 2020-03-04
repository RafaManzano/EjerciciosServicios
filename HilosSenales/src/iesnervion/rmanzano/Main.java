package iesnervion.rmanzano;

public class Main {

    public static void main(String[] args) {
	    Manejadora man = new Manejadora();
	    Productor prod = new Productor(man);
	    Consumidor cons = new Consumidor(man);

	    prod.start();
	    cons.start();
    }
}
