(function (wp) {
  const { registerBlockType } = wp.blocks;
  const { TextControl, Button} = wp.components;
  const { useBlockProps } = wp.blockEditor;
  const { useState } = wp.element;

  registerBlockType("custom/line-chart", {
      title: "Line Chart",
      icon: "chart-line",
      category: "widgets",
      attributes: {
          label1Name: { type: "string", default: "Main Label" },
          label1DataJSON: { type: "string", default: "[]" },
          label2Name: { type: "string", default: "Sub Label" },
          label2DataJSON: { type: "string", default: "[]" },
          label3Name: { type: "string", default: "U.S." },
          label3DataJSON: { type: "string", default: "[]" },
          lineChartId: { type: "string", default: "" }
      },

      edit: function (props) {
        const { attributes, setAttributes } = props;
        const blockProps = useBlockProps();
        const { useEffect, useState } = wp.element;
    
        const [newYear1, setNewYear1] = useState("");
        const [newValue1, setNewValue1] = useState("");

        const [newYear2, setNewYear2] = useState("");
        const [newValue2, setNewValue2] = useState("");

        const [newYear3, setNewYear3] = useState("");
        const [newValue3, setNewValue3] = useState("");

    
        let data1 = JSON.parse(attributes.label1DataJSON);
        let data2 = JSON.parse(attributes.label2DataJSON);
        let data3 = JSON.parse(attributes.label3DataJSON);
    
        useEffect(() => {
            if (!attributes.lineChartId || attributes.lineChartId.includes("lineChart_")) {
                setAttributes({
                    lineChartId: "lineChart_" + Date.now() + "_" + Math.random().toString(36).substr(2, 5)
                });
            }
        }, []);
    
        const addData = (data, labelDataJSON, year, value, setYear, setValue) => {
            if (!/^\d{4}$/.test(year.trim())) {
              alert("❌ Year must be a 4-digit number (e.g., 2024)!");
              return;
            }
          
            if (!value.trim()) {
              alert("❌ Please enter valid numeric values!");
              return;
            }
    
            let valuesArray = value.split(",").map(v => parseFloat(v.trim())).filter(v => !isNaN(v));
            if (valuesArray.length === 0) {
              alert("❌ Please enter at least one valid numeric value!");
              return;
            }
    
            data.push({ year: year, values: valuesArray });
            setAttributes({ [labelDataJSON]: JSON.stringify(data) });
    
            setYear("");
            setValue("");
        };
    
        const deleteData = (index, data, labelDataJSON) => {
          const newData = data.filter((_, i) => i !== index);
          setAttributes({ [labelDataJSON]: JSON.stringify(newData) });
        };
    
        const renderDataList = (data, labelDataJSON) => {
            return data.map((item, index) => {
                return wp.element.createElement(
                    "div",
                    { key: index, style: { display: "flex", alignItems: "center", marginBottom: "10px", gap: "10px" } },
    
                    wp.element.createElement(TextControl, {
                        label: `Year`,
                        value: item.year,
                        onChange: (value) => {
                            data[index].year = value;
                            setAttributes({ [labelDataJSON]: JSON.stringify(data) });
                        },
                        style: { width: "100%" }
                    }),
    
                    wp.element.createElement(TextControl, {
                        label: `Values (comma-separated)`,
                        value: item.values.join(", "),
                        onChange: (value) => {
                            let valuesArray = value.split(",").map(v => parseFloat(v.trim())).filter(v => !isNaN(v));
                            data[index].values = valuesArray;
                            setAttributes({ [labelDataJSON]: JSON.stringify(data) });
                        },
                        style: { width: "100%" }
                    }),
    
                    wp.element.createElement(Button, {
                        variant: "destructive",
                        onClick: () => deleteData(index, data, labelDataJSON),
                        style: { marginLeft: "10px" }
                    }, "🗑️ Delete")
                );
            });
        };
    
        return wp.element.createElement(
            "div",
            blockProps,
    
            wp.element.createElement("h4", { style: { marginBottom: "10px", fontSize: "16px", fontWeight: "bold" } }, "Line Chart Data"),
    
            wp.element.createElement(TextControl, {
              label: "Main Label Name",
              value: attributes.label1Name,
              onChange: (value) => setAttributes({ label1Name: value }),
              style: { fontWeight: "bold", fontSize: "14px"}
            }),
            renderDataList(data1, "label1DataJSON"),
            wp.element.createElement("div", { style: { marginTop: "10px", display: "flex", flexDirection: "column", gap: "10px" } },
                wp.element.createElement(TextControl, {
                    label: "Year",
                    value: newYear1,
                    onChange: (value) => setNewYear1(value),
                    style: { width: "100%" }
                }),
                wp.element.createElement(TextControl, {
                    label: "Values (comma-separated, max 12 values)",
                    value: newValue1,
                    onChange: (value) => setNewValue1(value),
                    style: { width: "100%" }
                }),
                wp.element.createElement(Button, {
                    variant: "primary",
                    onClick: () => addData(data1, "label1DataJSON", newYear1, newValue1, setNewYear1, setNewValue1),
                    style: { margin: "10px", width: "fit-content" }
                }, "Add Data")
            ),
    
            wp.element.createElement(TextControl, {
              label: "Sub Label Name",
              value: attributes.label2Name,
              onChange: (value) => setAttributes({ label2Name: value }),
              style: { fontWeight: "bold", fontSize: "14px"}
            }),
            renderDataList(data2, "label2DataJSON"),
            wp.element.createElement("div", { style: { marginTop: "10px", display: "flex", flexDirection: "column", gap: "10px" } },
                wp.element.createElement(TextControl, {
                    label: "Year",
                    value: newYear2,
                    onChange: (value) => setNewYear2(value),
                    style: { width: "100%" }
                }),
                wp.element.createElement(TextControl, {
                    label: "Values (comma-separated, max 12 values)",
                    value: newValue2,
                    onChange: (value) => setNewValue2(value),
                    style: { width: "100%" }
                }),
                wp.element.createElement(Button, {
                    variant: "primary",
                    onClick: () => addData(data2, "label2DataJSON", newYear2, newValue2, setNewYear2, setNewValue2),
                    style: { margin: "10px", width: "fit-content" }
                }, "Add Data")
            ),
    
            wp.element.createElement(TextControl, {
              label: "U.S Label",
              value: attributes.label3Name,
              onChange: (value) => setAttributes({ label3Name: value }),
              style: { fontWeight: "bold", fontSize: "14px"}
            }),
            renderDataList(data3, "label3DataJSON"),
            wp.element.createElement("div", { style: { marginTop: "10px", display: "flex", flexDirection: "column", gap: "10px" } },
                wp.element.createElement(TextControl, {
                    label: "Year",
                    value: newYear3,
                    onChange: (value) => setNewYear3(value),
                    style: { width: "100%" }
                }),
                wp.element.createElement(TextControl, {
                    label: "Values (comma-separated, max 12 values)",
                    value: newValue3,
                    onChange: (value) => setNewValue3(value),
                    style: { width: "100%" }
                }),
                wp.element.createElement(Button, {
                    variant: "primary",
                    onClick: () => addData(data3, "label3DataJSON", newYear3, newValue3, setNewYear3, setNewValue3),
                    style: { margin: "10px", width: "fit-content" }
                }, "Add Data")
            )
        );
      },    
      save: function (props) {
          const { attributes } = props;
          const blockProps = useBlockProps.save();

          return wp.element.createElement(
              "div",
              { 
                ...blockProps, 
                "data-line-chart-id": attributes.lineChartId, 
                "data-label1Name": attributes.label1Name,
                "data-label1DataJSON": attributes.label1DataJSON,
                "data-label2Name": attributes.label2Name,
                "data-label2DataJSON": attributes.label2DataJSON,
                "data-label3Name": attributes.label3Name,
                "data-label3DataJSON": attributes.label3DataJSON
              },
              wp.element.createElement("canvas", { id: attributes.lineChartId })
          );
      },
  });
})(window.wp);
