wp.blocks.registerBlockType("blocktheme/header", {
    title: "Header",
    edit: function () {
      return wp.element.createElement("div", { className: "placeholder-block" }, "Header Placeholder")
    },
    save: function () {
      return null
    }
  })
  