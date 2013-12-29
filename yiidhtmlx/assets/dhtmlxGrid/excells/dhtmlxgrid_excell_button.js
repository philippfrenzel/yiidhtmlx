function eXcell_button(cell){                                    //excell name is defined here
    if (cell){                                                     //default pattern, just copy it
        this.cell = cell;
        this.grid = this.cell.parentNode.grid;
    }
    this.edit = function(){}                                //read-only cell doesn't have edit method
    this.isDisabled = function(){ return true; }      // the cell is read-only, that's why it is always in the disabled state
    this.setValue=function(val){
        var row_id=this.cell.parentNode.id;
        this.setCValue("<a id='win_"+row_id+"' class='btn btn_default' href='"+val+"'>",val);                                      
    }
}
eXcell_button.prototype = new eXcell;    // nest all other methods from base class
