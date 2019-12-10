package ies.nervion.rmanzano.clases;



public class Libro {
	private int id;
	private String titulo;
	private int numpag;

    public Libro() {
        this.id = 0;
        this.titulo = "Defecto";
        this.numpag = 0;
	}

	public Libro(int id, String titulo, int numpag) {
		this.id = id;
		this.titulo = titulo;
		this.numpag = numpag;
	}

	public Libro(String titulo, int numpag) {
    	this.titulo = titulo;
    	this.numpag = numpag;
	}

	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public int getNumpag() {
		return numpag;
	}
	public void setNumpag(int numpag) {
		this.numpag = numpag;
	}
	public String getTitulo() {
		return titulo;
	}
	public void setTitulo(String titulo) {
		this.titulo = titulo;
	}
}
