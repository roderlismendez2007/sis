import tkinter as tk

class GananciaApp:
    def __init__(self, master):
        self.master = master
        master.title("Cálculo de Margen de Ganancia")

        # Crear los widgets
        self.label_nombre = tk.Label(master, text="Nombre del Producto:")
        self.entry_nombre = tk.Entry(master)

        self.label_precio_venta = tk.Label(master, text="Precio de Venta:")
        self.entry_precio_venta = tk.Entry(master)

        self.label_costo_produccion = tk.Label(master, text="Costo de Producción:")
        self.entry_costo_produccion = tk.Entry(master)

        self.button_calcular = tk.Button(master, text="Calcular Margen", command=self.calcular_margen)

        self.label_resultado = tk.Label(master, text="")

        # Organizar los widgets en la ventana
        self.label_nombre.grid(row=0, column=0)
        self.entry_nombre.grid(row=0, column=1)

        self.label_precio_venta.grid(row=1, column=0)
        self.entry_precio_venta.grid(row=1, column=1)

        self.label_costo_produccion.grid(row=2, column=0)
        self.entry_costo_produccion.grid(row=2, column=1)

        self.button_calcular.grid(row=3, column=0, columnspan=2)

        self.label_resultado.grid(row=4, column=0, columnspan=2)

    def calcular_margen(self):
        nombre = self.entry_nombre.get()
        precio_venta = float(self.entry_precio_venta.get())
        costo_produccion = float(self.entry_costo_produccion.get())

        ganancia_bruta = precio_venta - costo_produccion
        margen_ganancia = (ganancia_bruta / precio_venta) * 100

        resultado = f"El margen de ganancia del {nombre} es del {margen_ganancia:.2f}%"
        self.label_resultado.configure(text=resultado)

root = tk.Tk()
app = GananciaApp(root)
root.mainloop()