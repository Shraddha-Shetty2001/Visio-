import win32com.client

# Connect to Visio application
visio_app = win32com.client.Dispatch("Visio.Application")


# Open a specific Visio document
doc = visio_app.Documents.Open("C:/Users/hp/OneDrive/Desktop/flowchart.vsdx")

# Access the active page in the Visio document
page = doc.Pages(1)  # Adjust index if necessary

# Get a specific shape by name or ID (example assumes shape exists)
shape = page.Shapes.Item("Process")  # Replace with actual shape name

# Set hyperlink on the shape (example URL)
shape.CellsU("Hyperlink.Address").FormulaU = "http://localhost/todolist-Copy/index.php"



# Save changes and close Visio
doc.Save()
doc.Close()

# Quit Visio application
visio_app.Quit()
