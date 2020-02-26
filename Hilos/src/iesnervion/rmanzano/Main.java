package iesnervion.rmanzano;

public class Main {

    public static void main(String[] args) {
        Thread th1 = new Thread(new Runnable() {
            @Override
            public void run() {
                for(int i = 0; i < 1000000000; i++) {
                    System.out.println("Hilo 1: Contando de " + i + " a " + 10000000);
                }
            }
        });

        Thread th2 = new Thread(new Runnable() {
            @Override
            public void run() {
                for(int i = 0; i < 1000000000; i++) {
                    System.out.println("Hilo 2: Contando de " + i + " a " + 1000);
                }
            }
        });

        th1.start();
        th2.start();
    }
}
