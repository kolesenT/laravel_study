import { useContext } from "react";
import { useDispatch, useSelector } from "react-redux";
import AddNewItems from "../components/ToDoList/AddNewItem";
import Item from "../components/ToDoList/Item";
import MessageContext from "../context/MessageContext";
import { delAll, getAllItems } from "../store/ToDoSlice";
import './ToDoList.css';

function ToDoList() {
    const myCtx = useContext(MessageContext);
    const items = useSelector(getAllItems);
    const dispatch = useDispatch();

    const deleteAll = () => {
        console.log('click');
        dispatch(delAll());
        myCtx.ligth();
    }
    //console.log(items);

    return (
        <div className="container">
            <h1 className="text-center">Shopping List</h1>
            <div className="lg-6 md-8 sm-10 justify-content-center">
                <AddNewItems />
                <button onClick={deleteAll} class="btn btn-primary me-md-2" type="button">Delete all</button>
                <div className="my-3 p-3">
                    <ul className="list-group">
                        {items.map((item, index) =>
                            <Item
                                id={index}
                                key={index}
                                value={item.title}
                                isDone={item.isDone} />)}
                    </ul>
                </div>
            </div>
        </div>
    )
};

export default ToDoList;