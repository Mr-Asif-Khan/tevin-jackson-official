(function (wp) {
  const { registerBlockType } = wp.blocks;
  const { TextControl } = wp.components;
  const { useBlockProps } = wp.blockEditor;

  registerBlockType("custom/bar-chart", {
    title: "Bar Chart",
    icon: "chart-bar",
    category: "widgets",
    attributes: {
      label1Name: { type: "string", default: "Label 1" },
      label1Values: { type: "string", default: "2, 5, 12, 18, 10, 15, 20, 8, 5, 3, 1, 0.5, 0.3, 0.2, 0.1" },
      label2Name: { type: "string", default: "Label 2" },
      label2Values: { type: "string", default: "3, 6, 10, 16, 12, 14, 18, 10, 7, 5, 3, 2, 1, 0.8, 0.5" },
      barChartId: { type: "string", default: "" }
    },

    edit: function (props) {
      const { attributes, setAttributes } = props;
      const blockProps = useBlockProps();
      
      let barChartCounter = 0;
      if (!attributes.barChartId) {
        barChartCounter++
        setAttributes({ barChartId: "barChart_" + barChartCounter });
      }

      return wp.element.createElement(
        "div",
        blockProps,
        wp.element.createElement("h4", { style: { fontSize: "16px", fontWeight: "bold" } }, "Bar Chart Settings"),

        wp.element.createElement(TextControl, {
            label: "Label 1 Name",
            value: attributes.label1Name,
            onChange: (value) => setAttributes({ label1Name: value }),
        }),

        wp.element.createElement(TextControl, {
            label: "Label 1 Values (Comma Separated)",
            value: attributes.label1Values,
            onChange: (value) => setAttributes({ label1Values: value }),
        }),

        wp.element.createElement(TextControl, {
            label: "Label 2 Name",
            value: attributes.label2Name,
            onChange: (value) => setAttributes({ label2Name: value }),
        }),

        wp.element.createElement(TextControl, {
            label: "Label 2 Values (Comma Separated)",
            value: attributes.label2Values,
            onChange: (value) => setAttributes({ label2Values: value }),
        })
    );
},

save: function (props) {
    const { attributes } = props;
    const blockProps = useBlockProps.save();

    return wp.element.createElement(
      "div",
      { 
        ...blockProps, 
        "data-bar-chart-id": attributes.barChartId, 
        "data-label1Name": attributes.label1Name, 
        "data-label1Values": attributes.label1Values,  
        "data-label2Name": attributes.label2Name, 
        "data-label2Values": attributes.label2Values
      },
      wp.element.createElement("canvas", { id: attributes.barChartId, className: "bar-chart-canvas" })
    );
}
});
})(window.wp);


// wp.blocks.registerBlockType("custom/bar-chart", {
//   title: "Bar Chart",
//   icon: "chart-bar",
//   category: "widgets",
//   attributes: {
//       chartTitle: { type: "string", default: "Distribution of Home Values" },
//       label1Name: { type: "string", default: "Five Points" },
//       label1Values: { type: "string", default: "2,5,12,18,10,15,20,8,5,3,1,0.5,0.3,0.2,0.1" },
//       label2Name: { type: "string", default: "El Paso Metro Area" },
//       label2Values: { type: "string", default: "3,6,10,16,12,14,18,10,7,5,3,2,1,0.8,0.5" }
//   },
//   edit: function (props) {
//       function updateAttribute(attribute, value) {
//           props.setAttributes({ [attribute]: value });
//       }

//       return wp.element.createElement(
//           "div",
//           { className: "bar-chart-block" },
//           wp.element.createElement("h4", {}, "Bar Chart"),
//           wp.element.createElement("input", {
//               type: "text",
//               value: props.attributes.chartTitle,
//               onChange: (e) => updateAttribute("chartTitle", e.target.value),
//               placeholder: "Enter Chart Title"
//           }),
//           wp.element.createElement("input", {
//               type: "text",
//               value: props.attributes.label1Name,
//               onChange: (e) => updateAttribute("label1Name", e.target.value),
//               placeholder: "Enter Label 1 Name"
//           }),
//           wp.element.createElement("input", {
//               type: "text",
//               value: props.attributes.label1Values,
//               onChange: (e) => updateAttribute("label1Values", e.target.value),
//               placeholder: "Enter Label 1 Values (comma-separated)"
//           }),
//           wp.element.createElement("input", {
//               type: "text",
//               value: props.attributes.label2Name,
//               onChange: (e) => updateAttribute("label2Name", e.target.value),
//               placeholder: "Enter Label 2 Name"
//           }),
//           wp.element.createElement("input", {
//               type: "text",
//               value: props.attributes.label2Values,
//               onChange: (e) => updateAttribute("label2Values", e.target.value),
//               placeholder: "Enter Label 2 Values (comma-separated)"
//           })
//       );
//   },
//   save: function () {
//       return null; // Render via PHP
//   }
// });