package ies.nervion.rmanzano.clases;



public class Libro {
	private int codigo;
	private String titulo;
	private int numpag;

    public Libro() {
        this.codigo = 0;
        this.titulo = "Defecto";
        this.numpag = 0;
	}

	public Libro(int codigo, String titulo, int numpag) {
		this.codigo = codigo;
		this.titulo = titulo;
		this.numpag = numpag;
	}

	public Libro(String titulo, int numpag) {
    	this.titulo = titulo;
    	this.numpag = numpag;
	}

	public int getCodigo() {
		return codigo;
	}
	public void setCodigo(int id) {
		this.codigo = codigo;
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
