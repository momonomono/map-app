import { createRoot } from 'react-dom/client';
import React from 'react';
import Top from './page/Top';

const app = [
    { id: 'top', component: <Top /> }
];

app.forEach((id, component) => {
    const root = createRoot(document.getElementById(id));
    if (!root) return;
    root.render(component);
});