package iesnervion.rmanzano;

import java.util.Random;

public class Productor extends Thread {
    Manejadora man;

    Random random = new Random();

    public Productor (Manejadora m) {
        man = m;
    }

    public void run() {

            for(int i = 0; i < 50; i++) {
                char letra = (char) (random.nextInt(25) + 66);
                man.anhadir(letra);
                try {
                    sleep(random.nextInt(1000));
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
                System.out.println("Productor produce " + letra);
            }
        }


}
