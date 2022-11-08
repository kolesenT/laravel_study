import { render } from "@testing-library/react";
import { useState } from "react";
import './ToDoList.css';

function ToDoList() {
    const [input, setInput] = useState('');
    const [items, setItems] = useState([]);

    const onInputChange = (e) => {
        setInput(e.target.value);
    }

    const addItem = (e) => {
        //отменяет обработчик события по умолчанию
        e.preventDefault();

        if (input === '') {
            return;
        }

        const newItem = [...items, { value: input, isDone: false }];
        setItems(newItem);

        setInput('');
    }

    const toggleDone = (index) => {
        const newItem = [...items];

        newItem[index].isDone = !newItem[index].isDone;
        setItems(newItem);

    }

    const toggleDel = (index) => {
        const newItem = items.filter((_, i) => i != index);

        setItems(newItem);
    }


    const deleteAll = () => setItems([])

    return (
        <div className="container">
            <h1 className="text-center">Shopping List</h1>
            <div className="lg-6 md-8 sm-10 justify-content-center">
                <form className="input-group" onSubmit={addItem}>
                    <input onChange={onInputChange} value={input} type="text" className="form-control" />
                    <div className="input-group-append">
                        <button className="input-group-text">Add</button>
                    </div>
                    <button onClick={deleteAll} class="btn btn-light">Delete all</button>
                </form>

                <div className="my-3 p-3">
                    <ul className="list-group">
                        {items.map((item, index) =>
                            <Item key={index}
                                value={item.value}
                                isDone={item.isDone}
                                toggle={() => toggleDone(index)}
                                del={() => toggleDel(index)} />)}
                    </ul>
                </div>
            </div>
        </div>
    )

}

function Item({ value, isDone, toggle, del }) {
    return (
        <li className="list-group-item">
            <input onChange={toggle} checked={isDone} className="form-check-input me-1" type="checkbox" />
            <span>
                {value}
            </span>
            <button onClick={del} className="btn btn-secondary btn-sm">
                delete
            </button>
        </li>
    );
}

export default ToDoList;