package iesnervion.rmanzano;


import java.util.Random;

public class Consumidor extends Thread {
    private Manejadora man;
    Random random = new Random();

    public Consumidor (Manejadora m) {
        man = m;
    }

    public void run() {
        for(int i = 0; i < 50; i++) {
            Character valor = ' ';
            valor = man.coger();
            try {
                sleep(random.nextInt(1000));
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
            System.out.println("Consumidor coge " + valor);
        }
    }

}
