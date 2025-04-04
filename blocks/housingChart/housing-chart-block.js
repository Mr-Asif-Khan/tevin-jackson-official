(function (wp) {
  const { registerBlockType } = wp.blocks;
  const { TextControl } = wp.components;
  const { useBlockProps } = wp.blockEditor;

  registerBlockType("custom/housing-chart", {
      title: "Housing Chart",
      icon: "chart-area",
      category: "widgets",
      attributes: {
          rent: { type: "string", default: "50" },
          own: { type: "string", default: "50" },
          housingChartId: { type: "string", default: "" }
      },
      edit: function (props) {
          const { attributes, setAttributes } = props;
          const blockProps = useBlockProps({ className: "housing-chart" });

          let housingChartCounter = 0;
          if (!attributes.housingChartId) {
            housingChartCounter++
            setAttributes({ housingChartId: "chart_" + housingChartCounter });
        }

          return wp.element.createElement(
              "div",
              blockProps,
              wp.element.createElement("h4", { style: { fontSize: "16px", fontWeight: "bold" } }, "Housing Chart Settings"),
              wp.element.createElement(TextControl, {
                label: "Rent Percentage",
                value: attributes.rent,
                onChange: (value) => {
                if (/^\d*\.?\d*$/.test(value)) {
                    setAttributes({ rent: value });
                }
                },
              }),
              wp.element.createElement(TextControl, {
                label: "Own Percentage",
                value: attributes.own,
                onChange: (value) => {
                    if (/^\d*\.?\d*$/.test(value)) {
                        setAttributes({ own: value });
                    }
                },
              })
          );
      },
      save: function (props) {
          const { attributes } = props;
          const blockProps = useBlockProps.save({ className: "housing-chart" });

          return wp.element.createElement(
            "div",
            { ...blockProps, "data-housing-chart-id": attributes.housingChartId, "data-rent": attributes.rent, "data-own": attributes.own },
            wp.element.createElement("canvas", { id: attributes.housingChartId })
        );
      },
  });
})(window.wp);
