package iesnervion.rmanzano;

public class Manejadora {
    private boolean hayDato;
    private Character dato;

    public synchronized void anhadir(Character valor) {

        while (hayDato) {
            try {
                wait();
                System.out.println("El productor ha llamado al wait");
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        }
        dato = valor;
        hayDato = true;
        notifyAll();
        System.out.println("El productor ha llamado al notify");
    }

    public synchronized Character coger() {
        while (!hayDato) {
            try  {
                wait();
                System.out.println("El consumidor ha llamado al wait");
            }
            catch (InterruptedException e) {
                e.printStackTrace();
            }
        }

        hayDato = false;
        notifyAll();
        System.out.println("El consumidor ha llamado al notify");
        return dato;
        }
}


