(function (wp) {
  const { registerBlockType } = wp.blocks;
  const { TextControl, Button, ColorPicker, Popover } = wp.components;
  const { useBlockProps } = wp.blockEditor;
  const { useState } = wp.element;

  registerBlockType("custom/treemap-chart", {
      title: "Treemap Chart",
      icon: "chart-pie",
      category: "widgets",
      attributes: {
          dataJSON: { type: "string", default: "[]" },
          treemapChartId: { type: "string", default: "" }
      },

      edit: function (props) {
          const { attributes, setAttributes } = props;
          const blockProps = useBlockProps();
          const [newName, setNewName] = useState("");
          const [newCapacity, setNewCapacity] = useState("");
          const [newColor, setNewColor] = useState("#ff0000"); 
          const [colorPickerIndex, setColorPickerIndex] = useState(null);

          let data = JSON.parse(attributes.dataJSON);

          let treemapChartCounter = 0;
          if (!attributes.treemapChartId) {
              treemapChartCounter++
              setAttributes({ treemapChartId: "treemapChart_" + treemapChartCounter });
          }

          const addData = () => {
              if (newName.trim() === "" || newCapacity.trim() === "" || isNaN(newCapacity)) {
                  alert("❌ Please enter valid Name & Capacity!");
                  return;
              }
              data.push({ name: newName, capacityMW: parseFloat(newCapacity), color: newColor });
              setAttributes({ dataJSON: JSON.stringify(data) });
              setNewName("");
              setNewCapacity("");
          };

          const deleteData = (index) => {
              data.splice(index, 1);
              setAttributes({ dataJSON: JSON.stringify(data) });
          };

          return wp.element.createElement(
              "div",
              blockProps,

              wp.element.createElement("h4", { style: { marginBottom: "10px", fontSize: "16px", fontWeight: "bold" } }, "Treemap Chart Data"),

              data.map((item, index) => {
                  return wp.element.createElement("div", { key: index, style: { display: "flex", alignItems: "center", marginBottom: "10px", gap: "10px" } },
                      wp.element.createElement(TextControl, {
                          label: `Name`,
                          value: item.name,
                          onChange: (value) => {
                              data[index].name = value;
                              setAttributes({ dataJSON: JSON.stringify(data) });
                          },
                          style: { width: "100%" }
                      }),
                      wp.element.createElement(TextControl, {
                          label: `Capacity MW`,
                          type: "number",
                          value: item.capacityMW,
                          onChange: (value) => {
                              if (/^\d*\.?\d*$/.test(value)) {
                                  data[index].capacityMW = value;
                                  setAttributes({ dataJSON: JSON.stringify(data) });
                              }
                          },
                          style: { width: "100%" }
                      }),

                      wp.element.createElement("div", { 
                          style: { width: "24px", height: "24px", backgroundColor: item.color, border: "1px solid #ccc", cursor: "pointer", borderRadius: "4px" },
                          onClick: () => setColorPickerIndex(index)
                      }),

                      colorPickerIndex === index && wp.element.createElement(Popover, { onClose: () => setColorPickerIndex(null) },
                          wp.element.createElement(ColorPicker, {
                              color: item.color,
                              onChangeComplete: (color) => {
                                  data[index].color = color.hex;
                                  setAttributes({ dataJSON: JSON.stringify(data) });
                              }
                          })
                      ),

                      wp.element.createElement(Button, {
                          variant: "destructive",
                          onClick: () => deleteData(index),
                          style: { marginLeft: "10px" }
                      }, "🗑️ Delete")
                  );
              }),

              wp.element.createElement("h4", { style: { marginTop: "20px", fontSize: "16px", fontWeight: "bold" } }, "Add New Data"),
              wp.element.createElement("div", { style: { marginTop: "10px", display: "flex", flexDirection: "column", gap: "10px" } },
                  wp.element.createElement(TextControl, {
                      label: "Name",
                      value: newName,
                      onChange: (value) => setNewName(value),
                      style: { width: "100%" }
                  }),
                  wp.element.createElement(TextControl, {
                      label: "Capacity MW",
                      type: "number",
                      value: newCapacity,
                      onChange: (value) => setNewCapacity(value),
                      style: { width: "100%" }
                  }),

                  wp.element.createElement("div", { style: { marginTop: "10px" } },
                      wp.element.createElement("label", { style: { fontWeight: "bold" } }, "Select Color"),
                      wp.element.createElement(ColorPicker, {
                          color: newColor,
                          onChangeComplete: (color) => setNewColor(color.hex)
                      })
                  ),

                  wp.element.createElement(Button, {
                      variant: "primary",
                      onClick: addData,
                      style: { margin: "10px", width: "fit-content" }
                  }, "➕ Add Data")
              )
          );
      },

      save: function (props) {
          const { attributes } = props;
          const blockProps = useBlockProps.save();

          return wp.element.createElement(
              "div",
              { ...blockProps, "data-treemap-chart-id": attributes.treemapChartId, "data-datajson": attributes.dataJSON },
              wp.element.createElement("canvas", { id: attributes.treemapChartId })
          );
      },
  });
})(window.wp);
